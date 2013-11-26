<?php
include("connect.php");
$sql = "SELECT * FROM item";
$result = mysql_query($sql);

	echo "<option></option>";
	
while($row = mysql_fetch_array($result)){

	
	echo "<option>".$row['itemid']."</option>";

}
	

?>
