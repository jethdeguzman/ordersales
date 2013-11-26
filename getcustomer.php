<?php
include('connect.php');
$id = $_GET['name'];


$sql = "SELECT * FROM customer WHERE custid = '$id'";

$result = mysql_query($sql);

$row = mysql_fetch_assoc($result);

echo $row['fname'];

?>