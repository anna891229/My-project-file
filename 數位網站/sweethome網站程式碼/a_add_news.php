<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");

	$title = $_POST["title"];
	$info= $_POST["information"];
	$date = strval(date("Y/n/j"));
	$time = strval(date("H:i:s"));
	$sql = "INSERT INTO `new_information`(date,time,title,information) VALUES ('$date','$time','$title','$info')";
	$result= mysqli_query($link,$sql);
	if( $result === TRUE){
			
		echo "<script type = 'text/javascript'>";
		echo "alert('新增成功');";
		echo "history.back();";
		echo "</script>";
	}else{
		echo "<script type = 'text/javascript'>";
		echo "alert('新增失敗,請重新填寫');";
		echo "history.back();";
		echo "</script>";
	}
	
?>