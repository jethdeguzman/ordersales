<?php
include("connect.php");
$itemid = $_GET['itemid'];
$sql = "SELECT * FROM item WHERE itemid = '$itemid'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
echo json_encode($row);

?>
