<?php
include('connect.php');
$custid = $_POST['custid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$street = $_POST['street'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];



$sql = "INSERT INTO customer (custid, lname, fname, staddress, cityaddress, mobile, age, sex, dob, email) VALUES ('$custid', '$lname', '$fname', '$street', '$city', '$mobile', '$age', '$sex', '$dob', '$email' )";

$query = mysql_query($sql);

if (!$query){
	echo "ERROR".mysql_error();
}

echo "1 record added";

echo "<a href='insert.html'>Insert</a></br>";
echo "<a href='search.html'>Search</a>";


?>