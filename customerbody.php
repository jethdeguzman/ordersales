<div class="row-fluid">
          	<div class="span12" style="padding:10px; ">
            	<h2><i class="icon-group"></i> Customers</h2>
            </div>

          </div>
          <div class="row-fluid">
          	<div class="span12" style="padding:10px; ">
          		<div id="tab" class="btn-group" data-toggle="buttons-radio">
          		  <a href="#list-cust" class="btn active" data-toggle="tab"><i class="icon-list"></i> List of Customers</a>
          		  <a  href="#add-cust" class="btn addcust-tab" data-toggle="tab"><i class="icon-plus-sign"></i> Add New Customer</a>
          		  <a href="#search-cust" class="btn" data-toggle="tab"><i class="icon-search"></i> Search for Customer</a>
          		 
          		</div>
          		 
          		<div class="tab-content">
          		  <div class="tab-pane active" id="list-cust" style="margin-top:20px;">
          		  
          		  </div>
          		  <div class="tab-pane" id="add-cust" style="margin-top:20px;">
          		  	<div style="display:block;" class="addcust-success"><div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Successful!</strong> One new Customer has been added.</div></div>
          		  	<form id="addcust-form">
          		  	  <fieldset style="padding-left:20px;">
          		  	   
          		  	    <label>Customer Id</label>
          		  	    <input class="input-small" type="text" name="custid" placeholder="Customer Id" />
          		  	    <label>Name </label>
          		  	    <input type="text" name="fname" placeholder="Firstname" /> <input type="text" name="lname" placeholder="Lastname" />
          		  	    <label>Address </label>
          		  	    <input type="text" name="street" placeholder="Street" /> <input type="text" name="city" placeholder="City" />
          		  	    <label>Contact</label>
          		  	    <input type="text" name="mobile" placeholder="Mobile" /> <input type="email" name="email" placeholder="Email" />
          		  	    <label>Other Details</label>
          		  	    <input class="input-small" type="text" name="age" placeholder="Age" /> <input type="date" name="dob" placeholder="Date of Birth" /> <input class="input-small" type="text" name="sex" placeholder="Sex" /><br>
          		  	   
          		  	    <a  class="btn btn-primary addcust-btn">Submit</a> <button type="reset" class="btn">Clear</button>
          		  	  </fieldset>
          		  	</form>
          		  </div>
          		  <div class="tab-pane" id="search-cust" style="margin-top:20px;">
          		  		<input name="" class="search-custid"  type="text"  placeholder="Search Customer by ID"> <button style="vertical-align:top;" type="submit" class="btn btn-primary searchcust-btn"> <i class="icon-search icon-white"></i></button>

          		  		<div id="searchcust-result">
          		  		</div>
          		  </div>
          		  
          		</div>
          		 
          	</div>
          </div>


     <script type="text/javascript">
     $(document).ready(function(){
          $("#list-cust").load("listofcustomer.php");
          $(".addcust-tab").click(function(){
                    $(".addcust-success").hide();
               });

               
               $(".addcust-btn").click(function(){
                    
                    $.ajax({
                         url : 'addnewcustomer.php',
                         type : 'POST',
                         data : $("#addcust-form").serialize(),
                         success : function(data){
                              $("input").val("");
                              $(".addcust-success").show();
                              $("#list-cust").load("listofcustomer.php");
                         }
                    });
               });

               $(".searchcust-btn").click(function(){
                    if ($(".search-custid").val() != ""){


                    $.ajax({
                         url : "searchcustomer.php",
                         type: "get",
                         data : {
                              "custid" : $(".search-custid").val()
                         },
                         success : function(data){
                              $("#searchcust-result").html(data);
                         }
                    });
               }else{
                    $("#searchcust-result").html("");
               }

               });
               
     });

     </script>