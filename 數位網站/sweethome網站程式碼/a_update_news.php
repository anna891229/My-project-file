<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");

	$old = $_POST["title0"];
	$title = $_POST["title"];
	$info= $_POST["information"];
	$date = strval(date("Y/n/j"));
	$time = strval(date("H:i:s"));
	
	$sql = "UPDATE `new_information` SET `date`='$date',`time`='$time',`title`='$title',`information`='$info' WHERE `title`='$old'";
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