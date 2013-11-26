<?php
include("connect.php");
$sql = "SELECT * FROM customer";
$result = mysql_query($sql);
?>



<table class="table table-bordered table-striped">
	  <thead>
      <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Address</th>
                                     
      </tr>
  </thead>   
  <tbody>
       <?php
	       while($row = mysql_fetch_array($result)){
	    ?>
	    	<tr>
	    		<td><?php echo $row['custid']?></td>
	    		<td><?php echo $row['fname']." ".$row['lname']?></td>
	    		<td><?php echo $row['staddress'].", ".$row['cityaddress']?></td>
	    		

	    	</tr>
	    <?php }

       ?>            
  </tbody>
</table>