<?php
include("connect.php");
$data =json_decode($_POST['data'],true);
// $data = '{"custid":"001","date":"2013-09-11","totalamount":"300.00","orderlist":[{"itemid":"itm 003","itemqty":"2"}]}';
// $data = json_decode($data, true);
// die($data['orderlist'][0]['itemid']);


$length = sizeof($data['orderlist']);
$custid = $data['custid'];
$date = $data['date'];
$totalamount = $data['totalamount'];





$sql = "INSERT INTO dborder (id, orderdate, totalamt, custid) VALUES ('','$date', '$totalamount', '$custid')";
$result = mysql_query($sql);

$id = mysql_insert_id();


 for ($i=0; $i<$length; $i++){

 $itemid = $data['orderlist'][$i]['itemid'];
 $itemqty = $data['orderlist'][$i]['itemqty'];

 $sql2 = "INSERT INTO orderlist (id,orderid, itemid, qtyperitem) VALUES ('','$id', '$itemid', '$itemqty')";

 mysql_query($sql2);


 }





?>