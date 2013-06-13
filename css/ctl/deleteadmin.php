<!DOCTYPE html>

<html>
<body>

<?php
//global $user; 

$username = $_POST['username'];

if (empty($username)){
	echo "<script>\r\n";   
	echo " alert(\"no empty textfield is allowed \");\r\n";   
	echo "  history.back();";   
	echo "</script>";   
	exit;
}
else {
	$conn=mysql_connect("localhost", "root", "");//connect to mysql 
	  mysql_select_db("wepay");//choose database
	$sql = $sql = "DELETE FROM `admin_id` WHERE `username` = '$username'";
	$query = mysql_query($sql, $conn);
	if($query){
		echo "<script>\r\n";   
		echo " alert(\"delete succed \");\r\n";   
		echo "  location.replace(\"http://127.0.0.1/onlinepayment/maintenance.php\")\r\n";   
		echo "</script>";   
		exit;
	}
	else{
		echo "<script>\r\n";   
		echo " alert(\"failed! check username? \");\r\n";   
		echo " history.back();";   
		echo "</script>";   
		exit;
	}
}
?>
</body>
</html>