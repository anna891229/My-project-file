<?php
$host = 'localhost';
$dbuser ='superu';
$dbpassword = 'class100';
$dbname = 'sweety';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
       
//設定utf8 中文字才不會出現亂碼
mysqli_query($link,"set names utf8");
?>