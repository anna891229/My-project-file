<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");

	$account = $_POST["account"];
	$email= $_POST["useremail"];
	$password = $_POST["password"];
	$conpassword = $_POST["confirm-password"];
	
	if($password == $conpassword){
		$sql = "INSERT INTO `member`(username,userpwd,useremail) VALUES ('$account','$password','$email')";
		if($link->query($sql) === TRUE){
			
			echo "<script type = 'text/javascript'>";
			echo "alert('註冊成功');";
			echo "history.back();";
			echo "</script>";
		}else{
			echo "<script type = 'text/javascript'>";
			echo "alert('帳號已被註冊,請重新申請');";
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