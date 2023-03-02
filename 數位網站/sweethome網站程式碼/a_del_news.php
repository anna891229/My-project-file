<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");

	$title = $_POST["title0"];
	$sql = "DELETE FROM `new_information` WHERE `title`='$title'";
	$result= mysqli_query($link,$sql);
	if( $result === TRUE){
			
		echo "<script type = 'text/javascript'>";
		echo "alert('刪除成功');";
		echo "history.back();";
		echo "</script>";
	}else{
		echo "<script type = 'text/javascript'>";
		echo "alert('刪除失敗,請重新執行');";
		echo "history.back();";
		echo "</script>";
	}
	
?>