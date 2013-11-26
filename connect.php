<?php
$host = "localhost";
$username = "root";
$password = "jeth14";
$con = mysql_connect("$host", "$username", "$password");

if (!$con){

	die('Could not connect :'.mysql_error());
}
mysql_select_db("ORDER_SALES",$con);

?>