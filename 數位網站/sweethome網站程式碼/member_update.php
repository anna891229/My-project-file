<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");

	$name = $_COOKIE["id"];
	$pwd = $_POST["password"];
	$con_pwd= $_POST["confirm-password"];
	
	if($pwd == $con_pwd){
		$sql = "UPDATE `member` SET `userpwd`='$pwd' WHERE `username`='$name'";
		$result= mysqli_query($link,$sql);
		
		if($link->query($sql) === TRUE){
			
			echo "<script type = 'text/javascript'>";
			echo "alert('修改成功');";
			echo "history.back();";
			echo "</script>";
		}else{
			echo "<script type = 'text/javascript'>";
			echo "alert('修改失敗,請重新修改');";
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