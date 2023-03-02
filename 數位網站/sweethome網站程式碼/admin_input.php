<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");

	$account = $_POST["account"];
	$nanme = $_POST["name"];
	$password = $_POST["password"];
	$conpassword = $_POST["confirm-password"];
	
	if($password == $conpassword){
		$sql = "INSERT INTO `Admin`(AID,Aname,Apwd) VALUES ('$account','$name','$password')";
		if($link->query($sql) === TRUE){
			
			echo "<script type = 'text/javascript'>";
			echo "alert('登記成功');";
			echo "history.back();";
			echo "</script>";
		}else{
			echo "<script type = 'text/javascript'>";
			echo "alert('管理員帳號已被登記,請重新填寫');";
			echo "history.back();";
			echo "</script>";
		}
		
	}else{
		
		echo "<script type = 'text/javascript'>";
		echo "alert('二次輸入密碼錯誤,請再重新輸入');";
		echo "history.back();";
		echo "</script>";
		
		
	}
?>