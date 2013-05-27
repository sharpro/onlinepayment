<!DOCTYPE html>

<html>
<body>

<?php
//global $user; 
$id = $_POST['id'];
	$conn=mysql_connect("localhost", "root", "");//connect to mysql 
	mysql_select_db("wepay");//choose database
	$sql = "SELECT * FROM `user_info` WHERE `id` = '$id' AND `type` = '0'";
	$query = mysql_query($sql, $conn);
	$num = mysql_num_rows($query);
	if ($num == 0){
		echo "<script>\r\n";   
		echo " alert(\"no such demanded user \");\r\n";   
		echo " history.back();";   
		echo "</script>";   
		exit;		
	}
	else{
		if(!empty($id)){
			$sql1 = "UPDATE `wepay`.`user_info` SET `type` = 'user' WHERE `user_info`.`id` = '$id'";
			$query1 = mysql_query($sql1, $conn);
			if($query1 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update id fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		echo "<script>\r\n";   
		echo " alert(\"all update succed! \");\r\n";   
		echo "   location.replace(\"http://127.0.0.1/onlinepayment/blacklist.php\")\r\n";   
		echo "</script>";   
		exit;
	}

?>
</body>
</html>