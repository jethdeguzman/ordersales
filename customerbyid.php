<?php
include("connect.php");
$custid = $_GET['custid'];
$sql = "SELECT * FROM customer WHERE custid = '$custid'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
echo json_encode($row);

?>
