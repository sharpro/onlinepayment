<!DOCTYPE html>

<html>
<body>

<?php
//global $user; 
$id = $_POST['id'];
$username = $_POST['username'];
$id_card = $_POST['id_card'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$spassword = $_POST['spassword'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$type = $_POST['type'];
$email = $_POST['email'];
$exp = $_POST['exp'];

	$conn=mysql_connect("localhost", "root", "");//connect to mysql 
	mysql_select_db("wepay");//choose database
	$sql = "UPDATE `wepay`.`user_info` SET `id_card` = '$id_card' , `name` ='$name',`phone` = '$phone' ,
	`password` = '$password',`gender` = '$gender',`type` = '$type',`email` = '$email',
	`exp` = '$exp',`spassword` = '$spassword',`birthday` = '$birthday'
    	WHERE `user_info`.`username` = '$username'";
	$query = mysql_query($sql, $conn);
	

    if($query == FALSE){
	    echo "<script>\r\n";   
	    echo " alert(\"update fail! \");\r\n";   
		echo " history.back();";   
		echo "</script>";   
	exit;
	}
	echo "<script>\r\n";      
	echo "window.opener.location.href = \"http://127.0.0.1/onlinepayment/maintenance.php?type=1\";";
	echo " alert(\"all update succed! \");\r\n";
	echo "window.close();";
	echo "</script>";   
    exit;
?>
</body>
</html>