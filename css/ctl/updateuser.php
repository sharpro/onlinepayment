<!DOCTYPE html>

<html>
<body>

<?php
//global $user; 
$id = $_POST['id'];
$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$spassword = $_POST['spassword'];
$account = $_POST['account'];
$manager = $_POST['manager'];
$id_card = $_POST['id_card'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$exp = $_POST['exp'];
$type = $_POST['type'];
	$conn=mysql_connect("localhost", "root", "");//connect to mysql 
	mysql_select_db("wepay");//choose database
	$sql = "SELECT * FROM `user_info` WHERE `id` = '$id'";
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
		if(!empty($username)){
			$sql1 = "UPDATE `wepay`.`user_info` SET `username` = '$username' WHERE `user_info`.`id` = '$id'";
			$query1 = mysql_query($sql1, $conn);
			if($query1 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update username fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($name)){
			$sql2 = "UPDATE `wepay`.`user_info` SET `name` = '$name' WHERE `user_info`.`id` = '$id'";
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
			$sql3 = "UPDATE `wepay`.`user_info` SET `password` = '$password' WHERE `user_info`.`id` = '$id'";
			$query3 = mysql_query($sql3, $conn);
			if($query3 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update password fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($spassword)){
			$sql4 = "UPDATE `wepay`.`user_info` SET `spassword` = '$spassword' WHERE `user_info`.`id` = '$id'";
			$query4 = mysql_query($sql4, $conn);
			if($query4 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update spassword fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($account)){
			$sql5 = "UPDATE `wepay`.`user_info` SET `account` = '$account' WHERE `user_info`.`id` = '$id'";
			$query5 = mysql_query($sql5, $conn);
			if($query5 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update account fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($manager)){
			$sql6 = "UPDATE `wepay`.`user_info` SET `manager` = '$manager' WHERE `user_info`.`id` = '$id'";
			$query6 = mysql_query($sql6, $conn);
			if($query6 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update manager fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($id_card)){
			$sql7 = "UPDATE `wepay`.`user_info` SET `id_card` = '$id_card' WHERE `user_info`.`id` = '$id'";
			$query7 = mysql_query($sql7, $conn);
			if($query7 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update id_card fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($email)){
			$sql8 = "UPDATE `wepay`.`user_info` SET `email` = '$email' WHERE `user_info`.`id` = '$id'";
			$query8 = mysql_query($sql8, $conn);
			if($query8 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update email fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($phone)){
			$sql9 = "UPDATE `wepay`.`user_info` SET `phone` = '$phone' WHERE `user_info`.`id` = '$id'";
			$query9 = mysql_query($sql9, $conn);
			if($query9 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update phone fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($birthday)){
			$sql10 = "UPDATE `wepay`.`user_info` SET `birthday` = '$birthday' WHERE `user_info`.`id` = '$id'";
			$query10 = mysql_query($sql10, $conn);
			if($query10 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update birthday fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($gender)){
			$sql11 = "UPDATE `wepay`.`user_info` SET `gender` = '$gender' WHERE `user_info`.`id` = '$id'";
			$query11 = mysql_query($sql11, $conn);
			if($query11 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update gender fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($exp)){
			$sql12 = "UPDATE `wepay`.`user_info` SET `exp` = '$exp' WHERE `user_info`.`id` = '$id'";
			$query12 = mysql_query($sql12,$conn);
			if($query12 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update exp fail! \");\r\n";   
				echo " history.back();";   
				echo "</script>";   
				exit;
			}
		}
		if(!empty($type)){
			$sql13 = "UPDATE `wepay`.`user_info` SET `type` = '$type' WHERE `user_info`.`id` = '$id'";
			$query13 = mysql_query($sql13, $conn);
			if($query13 == FALSE){
				echo "<script>\r\n";   
				echo " alert(\"update type fail! \");\r\n";   
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