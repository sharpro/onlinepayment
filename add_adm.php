<!DOCTYPE html>
<html>
  <head>
    <title>Add member</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" >
		    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">		
			<!--other-->
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/style9.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" /> 

 <style type="text/css">
		.nav_button{
			float: right;
			padding:50px;
			width: 140px;
			margin-top: 15px;
			font-size: 20px;
			text-shadow:0px -1px 0px #000000,
			0px 1px 3px;
			font-weight: bold;	
			color:grey;
		}
		td{
			padding:4px;
			font-size:20px
			height:22px;
		}
		tr{
			height:50px;
		}
		.inputpanel{
			width:800px;
			height:340px;
			position:relative;left:200px;
			top:50px;
			
		}
		input[type="test"] {
		  display: inline-block;
		  height: 20px;
		  padding: 4px 6px;
		  margin-bottom: 10px;
		  font-size: 14px;
		  line-height: 20px;
		  color: #555555;
		  vertical-align: middle;
		  -webkit-border-radius: 4px;
			 -moz-border-radius: 4px;
				  border-radius: 4px;
		}
		input[type="submit"]{
          width:120px;
          margin-left:35px;
          display:block;
          font-family: Verdana, Arial;
          position:relative;left:120px;
        }
</style>
 </head>
<body>
 <header>
    <nav>	
		<div id="logo" ><a href="#"><img src="images/logo.png" alt="Logo here" /></a>  </div></td>
		<div class = "nav_button"><a href="mainaccess.php"><i>返回</i></a>&nbsp&nbsp<a href="index.php"><i>登出</i></a></div>
    </nav>
</header>
<div class="inputpanel">
	<div></div>
	<form class="form-horizontal" method = "POST" action = "add_adm.php">
	<table>
			<tr>
				<td><label class="control-label" for "inputid"><b>* 身份证</b></label>
				</td>
				<td>
					<input name = "id_card" id = "inputid" type = "test" placeholder="输入身份证">
				</td>
				<td><label class="control-label" for "inputemail"><b>e-mail</b></label>
				</td>
				<td>
					<input name = "email" id = "inputemail" type = "test" placeholder="输入e-mail">
				</td>
			</tr>
			<tr>
				<td><label class="control-label" for "inputname"><b>* 姓名</b></label>
				</td>
				<td>
					<input name = "name" id = "inputname" type = "test" placeholder="输入姓名">
				</td>
				<td><label class="control-label" for "inputphone"><b>电话</b></label>
				</td>
				<td>
					<input name = "phone" id = "inputphone" type = "test" placeholder="输入电话">
				</td>
			</tr>
			<tr>
				<td><label class="control-label" for "username"><b>* 用户名</b></label></td>
				<td>
					<input name = "username" id = "username" type = "test" placeholder="输入用户名">
				</td>
				<td><label class="control-label" for "inputid"><b>生日</b></label>
				</td>
				<td>
					<input name = "birthday" id = "inputbirthday" type = "test" placeholder="输入生日">
				</td>
			</tr>
			<tr>
				<td><label class="control-label" for "password"><b>* 密码</b></label></td>
				<td>
					<input name = "password" id = "password" type = "password" placeholder="输入密码">
				</td>
				<td><label class="control-label" for "inputgender"><b>性别</b></label>
				</td>
				<td>
					<form>
					<select name = "gender">
					<option value = "m">男</option>
					<option value = "f">女</option>
					</select>
					
				</td>
			</tr>
			<tr>
				<td><label class="control-label" for "vpassword"><b>* 确认密码</b></label></td>
				<td>
					<input name = "vpassword" id = "vpassword" type = "password" placeholder="确认密码">
				</td>
				<td><label class="control-label" for "inputmanager"><b>* 管理员类型</b></label>
				</td>
				<td>
					<form>
					<select name = "manager">
					<option value = "1">系统管理员</option>
					<option value = "2">在线支付管理员</option>
					</select>
					
				</td>
			</tr>
			<tr>
			    <td>
				</td>
				<td>
				    <input  type="submit" class = "btn-info" name="button" id="button" value="提交" />
				</td>
			</tr>
			
		</table>
		
	</form>
</div>
<footer>  
  <div id="footer">
    <details>
	<summary>
	<p>
	     Powered By Group B, Software Engineering
	 </p>
	<p>
		Powered By Bootstrap</p>
	
	 </summary>
	</details>
    </div>
</footer>
<?php
//global $user; 
if($_POST){
	$name=$_POST['name'];//get userid
	$password=$_POST['password'];//get password
	$username = $_POST['username'];
	$id_card = $_POST['id_card'];
	$manager=$_POST['manager'];
	$phone = $_POST['phone'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$vpassword = $_POST['vpassword'];	
	
	
	
	$conn=mysql_connect("localhost", "root", "");//connect to mysql 
	  mysql_select_db("wepay");//choose database
	  
	
    $result = mysql_query("select max(id) from user_info where manager = '1' OR manager  = '2' ",$conn);
	$row = mysql_fetch_array($result);
	$id = $row['max(id)']+1;
	
	echo "$id";
	
	if(empty($name) || empty($password) || empty($username) || empty($id_card)||empty($manager)||empty($vpassword)){
		echo "<script>\r\n";   
		echo " alert(\"带星的项目必须填写\");\r\n";   
		echo "</script>";   
		exit;
	}
	else if($password <> $vpassword)
	{
	    echo "<script>\r\n";   
		echo " alert(\"两次密码输入不一致\");\r\n";   
		echo "</script>";   
		exit;
	}
	else{
		$sql = "SELECT * FROM  `user_info` WHERE   `username` = '$username'";
		$query = mysql_query($sql, $conn);
		$num=mysql_num_rows($query);//get the number of correct records 1 or 0.
		if($num != 0){
			echo "<script>\r\n";   
			echo " alert(\"已经使用的用户名!\");\r\n";     
			echo "</script>";   
			exit;		
		}
		else{
			$sql1 = "INSERT INTO  `wepay`.`user_info` (id ,name ,username ,password,phone,id_card,manager,birthday,email)
			VALUES ('$id',  '$name',  '$username',  '$password','$phone', '$id_card' , '$manager' , '$birthday' , '$email')";
			$query1 = mysql_query($sql1, $conn);
			if($query1){
				echo "<script>\r\n";   
				echo " alert(\"成功新增管理员\");\r\n";    
				echo "</script>";   
				exit;  
			}
			else{
				echo "<script>\r\n";   
				echo " alert(\"添加管理员失败\");\r\n";   
				echo "</script>";   
				exit;
			}
		}

	}
}
?>


</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</html>