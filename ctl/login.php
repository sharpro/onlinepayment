<!DOCTYPE html>

<html>
<body>
<?php
//global $user; 
$user=$_POST['username'];//get userid
$password=$_POST['password'];//get password
$conn=mysql_connect("localhost", "root", "");//connect to mysql 
  mysql_select_db("wepay");//choose database
$sql = $sql = "SELECT * FROM `admin_id` WHERE `username` = '$user' AND `password` = '$password'";//check id and password to login
$query = mysql_query($sql, $conn);
$num=mysql_num_rows($query);//get the number of correct records 1 or 0.
if ($num == 0)//wrong
{    
	header("Location:http://127.0.0.1/onlinepayment/indexfail.php");
 }
else//right
{

	//setcookie('cookie_user',$_POST['user'],time()+7200,"/");//set cookie to stay signed in for two hour
    header("Location:http://127.0.0.1/onlinepayment/mainaccess.php");
	
}
?>

</body>
</html>