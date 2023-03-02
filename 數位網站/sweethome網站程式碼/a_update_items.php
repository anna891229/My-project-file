<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");

	$old = $_POST["title0"];
	$title = $_POST["title"];
	
	
	$sql = "UPDATE `item` SET `amounts`='$title' WHERE `itemid`='$old'";
	$result= mysqli_query($link,$sql);
	if( $result === TRUE){
			
		echo "<script type = 'text/javascript'>";
		echo "alert('修改成功');";
		echo "history.back();";
		echo "</script>";
	}else{
		echo "<script type = 'text/javascript'>";
		echo "alert('修改失敗,請重新改寫');";
		echo "history.back();";
		echo "</script>";
	}
	
?>