<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");
	
	$id = $_COOKIE['id'];
	$buyitemid = $_COOKIE['item'];
	$buyitemcount = $_COOKIE['itemcount'];
	$buyitemprice= $_COOKIE['itemprice'];
	$buyitemname = $_COOKIE['buyname'];
	$name = $_POST["name"];
	$email= $_POST["email"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$date = strval(date("Y/n/j"));
	$time = strval(date("H:i:s"));
	$str="";
	$count=0;
	$total = $_COOKIE['total'];
	$pay = $_POST["payment"];
	if($pay=="task"){
		$pay="貨到付款";
	}else{
		$pay="銀行轉帳";
	}
	for ($i=1;$i<19;$i++){
		if ($buyitemid[$i]!=""){
			$s = $buyitemname[$i]." x ".$buyitemcount[$i];
			if($count==0){
				$str=$s;
				$count+=1;
			}else{
				$str=$str.";".$s;
				$count+=1;
			}
		}
	}
	$sql = "INSERT INTO `c_order`(`date`, `time`, `userid`, `username`, `useremail`, `phone`, `address`, `content`, `price`,`payment`,`if_pay`) VALUES ('$date','$time','$id','$name','$email','$phone','$address','$str','$total','$pay','未付款')";
		if($link->query($sql) === TRUE){
			
			for ($i=1;$i<19;$i++){
				if($buyitemid[$i]!=""){
					$iid = $buyitemid[$i];
					$icount = $buyitemid[$i];
					$sql2 = "UPDATE `item` SET `amounts`=(0+`amounts`-'$icount') WHERE `itemid`='$iid'";
					$result= mysqli_query($link,$sql2);
					
				}
			}
			

			for ($i=1;$i<19;$i++){
				setcookie("item[$i]","",time()+7200);
				setcookie("itemcount[$i]","",time()+7200);
			}
			echo "<script type = 'text/javascript'>";
			echo "alert('成功送出訂單');";
			echo "history.back();";
			echo "</script>";
			
		}
	
?>