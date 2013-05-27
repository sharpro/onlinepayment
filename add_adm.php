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
			width:600px;
			height:400px;
			position:relative;left:420px;
			top:150px;
			background:url(images/inputpanel.png);
		}
		input {
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
</style>
 </head>
<body>
 <header>
    <nav>	
		<div id="logo" ><a href="#"><img src="images/logo.png" alt="Logo here" /></a>  </div></td>
		<div class = "nav_button"><a href="mainaccess.php"><i>Back</i></a>&nbsp&nbsp<a href="index.php"><i>sign out</i></a></div>
    </nav>
</header>
<div class="inputpanel">
	<div></div>
	<form class="form-horizontal" method = "post" action = "add_adm.php">
	<table>
			<tr>
				<td><label class="control-label" for "inputid"><b>ID</b></label>
				</td>
				<td>
					<input name = "id" id = "inputid" type = "test" placeholder="enter id">
				</td>
			</tr>
			<tr>
				<td><label class="control-label" for "inputname"><b>Name</b></label>
				</td>
				<td>
					<input name = "name" id = "inputname" type = "test" placeholder="enter name">
				</td>
			</tr>
			<tr>
				<td><label class="control-label" for "username"><b>UserName</b></label></td>
				<td>
					<input name = "username" id = "username" type = "test" placeholder="enter username">
				</td>
			</tr>
				<td><label class="control-label" for "password"><b>Password</b></label></td>
				<td>
					<input name = "password" id = "password" type = "test" placeholder="enter password">
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<input  type="submit" class = "btn" name="button" id="button" value="submit" />
				</td>
			</tr>
		</table>
	</form>
</div>
<?php
//global $user; 
if($_POST){
	$name=$_POST['name'];//get userid
	$password=$_POST['password'];//get password
	$username = $_POST['username'];
	$id = $_POST['id'];
	$conn=mysql_connect("localhost", "root", "");//connect to mysql 
	  mysql_select_db("wepay");//choose database
	 
	if(empty($name) || empty($password) || empty($username) || empty($id)){
		echo "<script>\r\n";   
		echo " alert(\"no empty textfield is allowed \");\r\n";   
		echo "</script>";   
		exit;
	}
	else{
		$sql = "SELECT * FROM  `admin_id` WHERE  `id` =  '$id' OR `username` = '$username'";
		$query = mysql_query($sql, $conn);
		$num=mysql_num_rows($query);//get the number of correct records 1 or 0.
		if($num != 0){
			echo "<script>\r\n";   
			echo " alert(\"used id or username !\");\r\n";     
			echo "</script>";   
			exit;		
		}
		else{
			$sql1 = "INSERT INTO  `wepay`.`admin_id` (`id` ,`name` ,`username` ,`password`)
			VALUES ('$id',  '$name',  '$username',  '$password')";
			$query1 = mysql_query($sql1, $conn);
			if($query1){
				echo "<script>\r\n";   
				echo " alert(\"insert complete\");\r\n";    
				echo "</script>";   
				exit;  
			}
			else{
				echo "<script>\r\n";   
				echo " alert(\"insert failed\");\r\n";   
				echo "</script>";   
				exit;
			}
		}

	}
}
?>
<footer>  
  <div id="footer">
    <details>
	<summary>
	<p>
		E-mail:<a href="mailto:op_feedback@163.com">op_feedback@163.com</a>
	 </p>
	<p>
		Copyright &copy; B5 -2013.</p>
	
	 </summary>
	</details>
    </div>
</footer>

</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</html>