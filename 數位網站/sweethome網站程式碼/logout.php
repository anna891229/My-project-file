<?php
// 連結資料庫
	setcookie("passed","FALSE", time()+7200);
	for ($i=1;$i<19;$i++){
				setcookie("item[$i]","",time()+7200);
				setcookie("itemcount[$i]","",time()+7200);
	}
		echo "<script type = 'text/javascript'>";
		echo "alert('登出成功');";
		echo "history.back();";
		echo "</script>";
?>