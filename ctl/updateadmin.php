<!DOCTYPE html>

<html>
<body>

<?php
//global $user; 
$id = $_POST['id'];
$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];

	$conn=mysql_connect("localhost", "root", "");//connect to mysql 
	mysql_select_db("wepay");//choose database
	$sql = "SELECT * FROM `admin_id` WHERE `username` = '$username'";
	$query = mysql_query($sql, $conn);
	$num = mysql_num_rows($query);
	if ($num == 0){
		echo "<script>\r\n";   
		echo " alert(\"no such user \");\r\n";   
		echo " history.back();";   
		echo "</script>";   
		exit;		
	}
	else{
		if(!empty($id)){
			$sql1 = "UPDATE `wepay`.`admin_id` SET `id` = '$id' WHERE `admin_id`.`username` = '$username'";
			$query1 = mysql_query($sql1, $conn);
			if($query1 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update id fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($name)){
			$sql2 = "UPDATE `wepay`.`admin_id` SET `name` = '$name' WHERE `admin_id`.`username` = '$username'";
			$query2 = mysql_query($sql2, $conn);
			if($query2 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update name fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($password)){
			$sql3 = "UPDATE `wepay`.`admin_id` SET `password` = '$password' WHERE `admin_id`.`username` = '$username'";
			$query3 = mysql_query($sql3, $conn);
			if($query3 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update password fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
				echo "<script>\r\n";   
				echo " alert(\"all update succed! \");\r\n";   
				echo "   location.replace(\"http://127.0.0.1/onlinepayment/maintenance.php\")\r\n";   
				echo "</script>";   
				exit;
	}

?>
</body>
</html>