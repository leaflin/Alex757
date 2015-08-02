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
if(!isset($_SESSION["username"]) || ($_SESSION["username"]=="")){
	header("Location: login.php");
}else{
	
 echo "welcome  ".$_SESSION["username"];
$query_RecMember = "SELECT * FROM `memberdata` WHERE `m_username`='".$_SESSION["username"]."'";
$RecMember = mysql_query($query_RecMember);	
$row_RecMember=mysql_fetch_assoc($RecMember);
	
}
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["username"]);
	header("Location: login.php");
}


?>
<h1><a href="?logout=true">logout</a></h1>
<?php echo $row_RecMember["m_name"]; ?>
</body>
</html>
