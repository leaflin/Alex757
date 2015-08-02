<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();
if(isset($_POST["username"])&&isset($_POST["password"])){
	$login = "SELECT * FROM `memberdata` WHERE `m_username`='".$_POST["username"]."'";
	$RecLogin = mysql_query($login);
	$row_RecLogin=mysql_fetch_assoc($RecLogin);
	$username = $row_RecLogin["m_username"];
	$passwd = $row_RecLogin["m_passwd"];
if(($_POST["username"]==$username)&&($_POST["password"]==$passwd)){

	 $_SESSION["username"]=$username;
	 echo "welcome".$_SESSION["username"];
	header("Location: mem.php");	
	

	}else{
		echo "you username error";
		}
}
?>
<form id="form1" name="form1" method="post">
  <p>
    <label for="username">username:</label>
    <input type="text" name="username" id="username">
  </p>
  <p>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
  </p>
  <p>
    <input type="submit" name="button" id="button" value="login">
  </p>
</form>
</body>
</html>
