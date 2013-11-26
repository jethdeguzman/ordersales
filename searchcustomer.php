<?php
include("connect.php");
$custid = $_GET['custid'];
$sql = "SELECT * FROM customer WHERE custid = '$custid'";
$result = mysql_query($sql);


if (mysql_num_rows($result)){


echo "<table class='table table-bordered table-striped'>
	  <thead>
      <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Address</th>
          <th>Mobile</th>
          <th>Email</th>
          <th>Age</th>
          <th>Date of Birth</th>
          <th>Sex</th>                                          
      </tr>
  </thead>   
  <tbody>"; 
	      
	       while($row = mysql_fetch_array($result)){
	   			

	       			
				    echo"<tr><td>"; 
				    echo $row['custid'];  
				    echo "</td><td>"; 
				    echo $row['fname'].' '.$row['lname']; 
				    echo "</td><td>"; 
				    echo $row['staddress'].",".$row['cityaddress'];
				    echo "</td><td>";
				    echo $row['mobile'];
				    echo "</td><td>";
				    echo $row['email'];
				    echo "</td><td>";
				    echo $row['age'];
				    echo "</td><td>";
				    echo $row['dob'];
				    echo "</td><td>";
				    echo $row['sex'];
				    echo "</td></tr></tbody></table>";
				
	}
}else{
	echo "<table class='table table-bordered table-striped'>
	  <thead>
      <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Address</th>
          <th>Mobile</th>
          <th>Email</th>
          <th>Age</th>
          <th>Date of Birth</th>
          <th>Sex</th>                                          
      </tr>
  </thead>   
  <tbody><tr><td colspan='8' style='text-align:center; color:red;'>No Record Found</td></tr></tbody></table>"; 
}
?>

