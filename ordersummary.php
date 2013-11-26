<?php
include("connect.php");


$custid = $_GET['custid'];
$date   = $_GET['date'];





$sql = "SELECT b.id, b.totalamt FROM dborder b  LEFT JOIN  orderlist a on a.orderid = b.id WHERE b.custid = '$custid' AND b.orderdate = '$date'";

$result = mysql_query($sql);
$row = mysql_fetch_array($result);

$orderid = $row['id'];
$totalamount = $row['totalamt'];

$sql2 = "SELECT a.itemid, a.itemdesc, a.price, b.qtyperitem FROM item a LEFT JOIN orderlist b on a.itemid = b.itemid WHERE b.orderid = '$orderid'";

$result2 = mysql_query($sql2);

echo "<table class='table table-bordered'><tr><th>Item Id</th><th>Item Desc</th><th>Amount</th><th>Qty</th><th>Total</th></tr>";
while($row2 = mysql_fetch_array($result2)){
	echo "<tr class='items'><td>".$row2['itemid']."</td><td>".$row2['itemdesc']."</td><td>".$row2['price']."</td><td>".$row2['qtyperitem']."</td><td class='totalprice'>".$row2['price'] * $row2['qtyperitem']."</td></tr>";
}
echo "<tr><td colspan='3'></td><th>Total</th><td>".$totalamount."</td></tr></table>";








?>