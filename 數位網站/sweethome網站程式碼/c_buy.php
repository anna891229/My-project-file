<?php
$passed = $_COOKIE["passed"];
if($passed != "TRUE"){
	header("location:login.html");
	exit();
}
require_once("connect.php");
header("Content-Type: text/html; charset=utf-8");
$good_id=$_GET['id'];
$sql = "SELECT * FROM `item` WHERE `itemid` = '$good_id' ";
// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result= mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);

setcookie("item[$good_id]","$good_id",time()+7200);
setcookie("itemcount[$good_id]","1",time()+7200);
setcookie("itemprice[$good_id]","$row[price]",time()+7200);
setcookie("buyname[$good_id]","$row[name]",time()+7200);
echo "<script type = 'text/javascript'>";
echo "alert('加入至購物車');";
echo "history.back();";
echo "</script>";
?>