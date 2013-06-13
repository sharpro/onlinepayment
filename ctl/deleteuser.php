<!DOCTYPE html>

<html>
<body>

<?php
//global $user; 

$id = $_GET['id'];



	$conn=mysql_connect("localhost", "root", "");//connect to mysql 
	  mysql_select_db("wepay");//choose database
	$sql = $sql = "DELETE FROM `user_info` WHERE `id` = '$id'";
	$query = mysql_query($sql, $conn);
	if($query){
		echo "<script>\r\n";   
		echo " alert(\"³É¹¦É¾³ý\");\r\n";   
		echo "  location.replace(\"http://127.0.0.1/onlinepayment/maintenance.php?type=1\")\r\n";   
		echo "</script>";   
		exit;
	}
	else{
		echo "<script>\r\n";   
		echo " alert(\"É¾³ýÊ§°Ü\");\r\n";   
		echo " history.back();";   
		echo "</script>";   
		exit;
	}

?>
</body>
</html>