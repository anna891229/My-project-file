<?php
// 連結資料庫
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");

	$account = $_POST["account"];
	$password = $_POST["password"];
	//從user中選取全部(*)的資料
	$sql = "SELECT * FROM `member` WHERE `username` = '$account' AND `userpwd` = '$password' ";

	// 用mysqli_query方法執行(sql語法)將結果存在變數中
	$result= mysqli_query($link,$sql);

	if (mysqli_num_rows($result)==0){
		mysqli_free_result($result);
		mysqli_close($link);
		
		echo "<script type = 'text/javascript'>";
		echo "alert('帳號密碼錯誤,請再重新輸入');";
		echo "history.back();";
		echo "</script>";
	}
	else{
		mysqli_free_result($result);
		mysqli_close($link);
		setcookie("id",$account, time()+7200);
		setcookie("passed","TRUE", time()+7200);
		header("location:index.php");
	}
?>