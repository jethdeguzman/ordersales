<?php
include('connect.php');

$custid = $_POST['custid'];



$sql = "SELECT * FROM customer WHERE custid = '$custid'";

$result = mysql_query($sql);

$row = mysql_fetch_array($result);



echo '<fieldset>';

		echo 'Customer ID: '.$row['custid'];
			echo '<hr/>';
			echo '<br/>';

		echo '<table border="1" spacing="1">';

			echo "<thead>";
			echo "<tr>";
				echo "<th>Customer Name</th>";
				echo "<th>Address</th>";
				echo "<th>Mobile</th>";
				echo "<th>Email</th>";
				echo "<th>Age</th>";
				echo "<th>Date of Birth</th>";
				echo "<th>Sex </th>";
			echo "</thead>";
			echo "</tr>";

			echo "<tbody>";

			echo "<tr>";
				echo "<td>".$row['fname'].' '.$row['lname']."</td>";
				echo "<td>".$row['staddress'].', '.$row['cityaddress']."</td>";
				echo "<td>".$row['mobile']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['age']."</td>";
				echo "<td>".$row['dob']."</td>";
				echo "<td>".$row['sex']."</td>";
			echo "</tr>";

			echo "</tbody>";

		echo "</table>";

	echo '</fieldset>';


echo "<a href='insert.html'>Insert</a></br>";
echo "<a href='search.html'>Search</a>";
?>