<?php
include("connect.php");
$sql = "SELECT * FROM customer";
$sql2 = "SELECT * FROM customer";
$result = mysql_query($sql);


$result2 = mysql_query($sql2);


?>

<div class="row-fluid">
          	<div class="span12" style="padding:10px; ">
            	<h2><i class="icon-shopping-cart"></i> Orders</h2>
            </div>

          </div>
          <div class="row-fluid">
          	<div class="span12" style="padding:10px; ">
          		<div id="tab" class="btn-group" data-toggle="buttons-radio">
          		  <a href="#create-order" class="btn active" data-toggle="tab"><i class="icon-list-alt"></i> Create Order List</a>
          		  <a  href="#view-order" class="btn vieworder-tab" data-toggle="tab"><i class="icon-file-text"></i> View Order Summary</a>
          		  
          		 
          		</div>
          		 
          		<div class="tab-content">
          		  <div class="tab-pane active" id="create-order" style="margin-top:20px;">
          		        <table class="table table-bordered ">
                              <tr>
                                   <td colspan="5"></td>
                                   
                                   <td style="width:20%;"><b>Date: </b><span class="date"><?php echo date('Y-m-d');?></span></td>
                              </tr>
                              <tr>
                                   <td style="padding:5px -200px 0px 5px; width:25%; " >
                                          <b>Customer ID:</b>
                                          <select class="cust-dropdown span6">
                                             <option></option>
                                             <?php
                                              while($row = mysql_fetch_array($result)){
                                             ?>
                                                  <option><?php echo $row['custid'];?></option>
                                             <?php }
                                             ?>
                                        </select>
                                       

                                   </td>
                                   <td colspan="5"><b>Name: </b><span class="custname-col"></span><br><b>Address: </b><span class="custaddress-col"> </span> </td>
                                   
                              </tr>
                             
                              <tr>
                                   <th>Item ID</th>
                                   <th>Item Desc.</th>
                                   <th>Amount</th>
                                   <th>QTY</th>
                                   <th>Total</th>
                                   <th>Option</th>
                              </tr>
                              <tbody class="itemrow">

                              </tbody>

                              <tr>
                                   <td colspan="3"><a class="btn btn-inverse additem-btn"><i class="icon-plus-sign"></i> Add Item</a></td>
                                   <th>Total</th>
                                   <td colspan="2" class="totalorder"></td>
                              </tr>
                            </table>
                            <a class="btn btn-primary submitorder-btn pull-right">Submit</a>

          		  </div>
          		  <div class="tab-pane" id="view-order" style="margin-top:20px;">
                        <b>Customer ID:</b>
                        <select class="cust-dropdown2 span2">
                           <option></option>
                           <?php
                            while($row2 = mysql_fetch_array($result2)){
                           ?>
                                <option><?php echo $row2['custid'];?></option>
                           <?php }
                           ?>
                      </select>
                      <b>Date:</b>
                      <input type="date" class="span2" id="searchdate"/> <button style="vertical-align:top;" type="submit" class="btn btn-primary searchorder-btn"> <i class="icon-search icon-white"></i></button> <br>
                      <b>Name: </b><span class="searchordername"></span><br>
          		  <b>Address: </b><span class="searchorderaddress"></span>
          		  <div class="searchresult"></div>
          		</div>
          		 
          	</div>
          </div>


     <script type="text/javascript">
     $(document).ready(function(){
        
          $(".cust-dropdown2").change(function(){

               
               $.ajax({
                    url : "customerbyid.php",
                    type : "GET",
                    dataType: "JSON",
                    data : {
                         "custid" : $(this).val()
                    },
                    success : function(data){
                         $(".searchordername").html(data.fname +" "+data.lname);
                         $(".searchorderaddress").html(data.staddress +" "+data.cityaddress);
                    }
               });
          });

          $(".cust-dropdown").change(function(){

               
               $.ajax({
                    url : "customerbyid.php",
                    type : "GET",
                    dataType: "JSON",
                    data : {
                         "custid" : $(this).val()
                    },
                    success : function(data){
                         $(".custname-col").html(data.fname +" "+data.lname);
                         $(".custaddress-col").html(data.staddress +" "+data.cityaddress);
                    }
               });
          });

          $(".additem-btn").click(function(){
               $(".itemrow").append("<tr class='group'><td class='itemid-dropdown'><select class='itemid-select'></select></td><td class='itemdesc'></td><td class='itemamount'>0.00</td><td class='itemqty'></td><td class='itemtotal'>0.00</td><td class='itemdelete'><a class='btn btn-danger deleteitem-btn'><i class='icon-minus-sign'></i> Remove Item</a></td></tr>");
               $.ajax({
                    url : "itemdropdown.php",
                    success : function(data){
                         $(".itemrow tr").last().find('.itemid-dropdown .itemid-select').html(data);

                    }
               });
          });

          $(".itemrow").on("change", "tr td.itemid-dropdown select.itemid-select" ,function(){
               
               var itemdesc, itemamount;
               $.ajax({
                    url : "itembyid.php",
                    type : "GET",
                    dataType : "JSON",
                    async : false,
                    data : {
                         "itemid" : $(this).val()
                    },
                    success : function(data){
                         
                        itemdesc = data.itemdesc;
                        itemamount = data.price;
                    }
               });
               $(this).parent().next().html(itemdesc);
               $(this).parent().next().next().html(itemamount);
               $(this).parent().next().next().next().html("<input class='input-small itemqtyvalue' value=0 type='text'>");
               totalorder();
          });

          $(".itemrow").on("keyup", "tr td.itemqty input.itemqtyvalue", function(){
               var itemamount = $(this).parent().prev().text();
               itemamount = parseFloat(itemamount).toFixed(2);
               var total = parseFloat($(this).val()) * itemamount;
               if (isNaN($(this).val()) || $(this).val() == "" ){
                    total = 0.00;
                    $(this).parent().next().text(total.toFixed(2));
               }else{
                    $(this).parent().next().text(total.toFixed(2));
               }
               totalorder();
             //  alert( + "itemamount: "+ itemamount);

          });

          $(".itemrow").on("click","tr td.itemdelete a.deleteitem-btn", function(){
               $(this).parent().parent().remove();
               totalorder();
          });

          function totalorder(){
               var totalorder = 0;
               $(".itemtotal").each(function(){
                    var amount = parseFloat($(this).text());
                    totalorder = totalorder + amount;
                    $(".totalorder").text(totalorder.toFixed(2));
               });
          }
          $(".submitorder-btn").click(function(){
               
               var data = {};
               data = {"custid" : $(".cust-dropdown").val(), "date" : $(".date").text(), "totalamount" : $(".totalorder").text(), "orderlist" :[]};
               $(".group").each(function(){
                    data.orderlist.push({"itemid" : $(this).find(".itemid-dropdown select.itemid-select").val(), "itemqty" : $(this).find(".itemqty input.itemqtyvalue").val()});
               });
               var jsonarray = JSON.stringify(data);
               console.log(jsonarray);
               $.ajax({
                    url : "addneworder.php",
                    type : "POST",
                    dataType : "JSON",
                    data : {'data':jsonarray},
                    success : function(data){
                         alert("asd");
                    }
               });
          });
         

         $(".searchorder-btn").click(function(){
               var custid = $(".cust-dropdown2").val();
               var searchdate = $("#searchdate").val();

          
               $.ajax({
                    url : "ordersummary.php",
                    type: "GET",
                    data : {
                         "custid" : custid,
                         "date"   : searchdate
                    },
                    success : function(data){
                         $(".searchresult").html(data);
                         $('.totalprice').each(function(){
                              var total  = 0;

                              var amount = parseFloat($(this).text().toFixed(2));
                              total = total + amount;

                              $('.total').text(total);
                         });
                    }
               });

         });

               
          



               
     });

     </script>