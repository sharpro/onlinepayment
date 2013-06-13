<!DOCTYPE html>
<html>
  <head>
    <title>online payment system</title>
	<style>
		.maininfo{
			position:relative;
			top:20px;
			width:1000px;
			height:100px;
			background:url(images/inputpanel2.png);
			cellpadding:3px;
		}
		.mainprint{
			position:relative;
			top:20px;
			width:1000px;
			height:100px;
			background:url(images/inputpanel2.png);
			cellpadding:3px;
		}
		.mainprint2{
			position:relative;
			top:20px;
			width:1000px;
			height:100px;
			background:url(images/inputpanel2.png);
			cellpadding:3px;
			font-size:20px;
		}
		.mainprint3{
			position:relative;
			top:20px;
			width:1000px;
			height:1400px;
			background:url(images/inputpanel3.png);
			cellpadding:3px;
			font-size:20px;
		}
		.mainprint4{
			position:relative;
			top:20px;
			width:1000px;
			height:400px;
			background:url(images/inputpanel3.png);
			cellpadding:3px;
			font-size:20px;
		}
	</style>
	<meta charset="utf-8" >
		    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">	  

 </head>
 <body>

<?php include "header.php"?>

<fieldset>
	<div align = "center">
		<form method = "post" action = "maintenance.php">
			<table class = "maininfo">
				<tr>
				</tr>
				<tr>
				<td style="width:400px;text-align:right;padding:3px;">
					<label><b>Please select a type<b></label>
				</td>
				<td style="width:400px;text-align:left;padding:3px;">
					<label class = "checkbox inline">
						<input type = "radio" name = "typevalue"  value = "1" /><b>user</b>
						<input type = "radio" name = "typevalue" value = "2" /><b>administrator</b>
					</label>	
				</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
						<input type="submit" name="button" id="button" value="OK" />
					</td>
				</tr>
				<tr>
				</tr>
			<table>
		</form>
	</div>
</fieldset>
<?php
//global $user; 
if($_POST){
	$type = $_POST['typevalue'];

	if($type == 1){
		$table = 'user_info';
	}
	else{
		$table = 'admin_id';
	}
	if (empty($table)){
		echo "<script>\r\n";   
		echo " alert(\"no empty textfield is allowed \");\r\n";   
		echo " location.replace(\"http://127.0.0.1/onlinepayment/checkinfo.php\")\r\n";   
		echo "</script>";   
		exit;
	}
	else {
		$conn=mysql_connect("localhost", "root", "");//connect to mysql 
		  mysql_select_db("wepay");//choose database
		$sql = "SELECT * FROM `$table`";
		$query = mysql_query($sql, $conn);
		$num=mysql_num_rows($query);//get the number of correct records
		$cnt = 0;
		$row = mysql_fetch_array($query);
		if($type == 1){
				echo "<p>User</p>";
				echo "<table  border='1' class = 'mainprint'>
						<tr>
							<td>id</td>
							<td>username</td>
							<td>name</td>
							<td>password</td>
							<td>spassword</td>
							<td>account</td>
							<td>manager</td>
							<td>id_card</td>
							<td>email</td>
							<td>phone</td>
							<td>birthday</td>
							<td>gender</td>
							<td>exp</td>
							<td>type</td>
						</tr>";
		}
		else{
				echo "<p>administrator</p>";
				echo "<table border='1' class = 'mainprint'>
						<tr>
							<td>id</td>
							<td>username</td>
							<td>name</td>
							<td>password</td>
						</tr>";
		}
		while ($num > $cnt){ //may be same name or password
			if($type == 1){  //for user
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['password']."</td>";
				echo "<td>".$row['spassword']."</td>";
				echo "<td>".$row['account']."</td>";
				echo "<td>".$row['manager']."</td>";
				echo "<td>".$row['id_card']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['phone']."</td>";
				echo "<td>".$row['birthday']."</td>";
				echo "<td>".$row['gender']."</td>";
				echo "<td>".$row['exp']."</td>";
				echo "<td>".$row['type']."</td>";
				echo "</tr>";
					
			}
			else{				//for administrator
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['password']."</td>";
				echo "</tr>";
			}
			$cnt++;
			$row = mysql_fetch_array($query);
		}
		echo "</table>";
		
		//delete the information
		if($type == 1){
			echo "<form method ='post', action = 'ctl/deleteuser.php'>
				    <table class = 'mainprint2'>
					<tr>
						<td align ='right'>
							Fill the id to delete
						</td>
						<td>
						</td>
					</tr>
					<tr>
						<td><input type = 'test' name = 'id' /></td>
						<td><input type='submit' name='button' id='button' value='OK' /></td>
					</tr>
					<table>
				</form>";
		}
		else{
			echo "<form method ='post', action = 'ctl/deleteadmin.php'>
				    <table class = 'mainprint2'>
					<tr>
						<td>
							Fill the username to delete
						</td>
						<td>
						</td>
					</tr>
					<tr>
						<td align = 'right'><input type = 'test' name = 'username' />
						<input type='submit' name='button' id='button' value='OK' />
						</td>
					</tr>
					<table>
				</form>";			
		}
		echo "<p>Update</P>";
		
		//update the information
		if($type == 1){
			echo "<form method = 'post' action = 'ctl/updateuser.php'>
					<table class ='mainprint3'>

						<tr>	
							<td align = 'right'>update(id must be filled)</td>
							<td></td>
						</tr>
						<tr>
							<td align = 'right'>id</td>
							<td><input type ='text' name = 'id'/></td>
						</tr>
						<tr>
							<td align = 'right'>username</td>
							<td><input type ='text' name = 'username'/></td>
						</tr>
						<tr>
							<td align = 'right'>name</td>
							<td><input type ='text' name = 'name'/></td>
						</tr>
						<tr>
							<td align = 'right'>password</td>
							<td><input type ='text' name = 'password'/></td>
						</tr>
						<tr>
							<td align = 'right'>spassword</td>
							<td><input type ='text' name = 'spassword'/></td>
						</tr>
						<tr>
							<td align = 'right'>account</td>
							<td><input type ='text' name = 'account'/></td>
						</tr>
						<tr>
							<td align = 'right'>manager</td>
							<td><input type ='text' name = 'manager'/></td>
						</tr>
						<tr>
							<td align = 'right'>id_card</td>
							<td><input type ='text' name = 'id_card'/></td>
						</tr>
						<tr>
							<td align = 'right'>email</td>
							<td><input type ='text' name = 'email'/></td>
						</tr>
						<tr>
							<td align = 'right'>phone</td>
							<td><input type ='text' name = 'phone'/></td>
						</tr>
						<tr>
							<td align = 'right'>birthday</td>
							<td><input type ='text' name = 'birthday'/></td>
						</tr>
						<tr>
							<td align = 'right'>gender</td>
							<td><input type ='text' name = 'gender'/></td>
						</tr>
						<tr>
							<td align = 'right'>exp</td>
							<td><input type ='text' name = 'exp'/></td>
						</tr>
						<tr>
							<td align = 'right'>type</td>
							<td><input type ='text' name = 'type'/></td>
						</tr>
						<tr>
							<td>
							</td>
							<td>
								<input type='submit' name='button' id='button' value='OK' />
							</td>
						</tr>
					</table>					
				</form>";
		}
		else{
			echo "<form method = 'post' action = 'ctl/updateadmin.php'>
					<table class='mainprint4'>
						<tr>	
							<td align = 'right'>update(username must be filled)</td>
							<td></td>
						</tr>
						<tr>
							<td align = 'right'>id</td>
							<td><input type ='text' name = 'id'/></td>
						</tr>
						<tr>
							<td align = 'right'>username</td>
							<td><input type ='text' name = 'username'/></td>
						</tr>
						<tr>
							<td align = 'right'>name</td>
							<td><input type ='text' name = 'name'/></td>
						</tr>
						<tr>
							<td align = 'right'>password</td>
							<td><input type ='text' name = 'password'/></td>
						</tr>
						<tr>
							<td>
							</td>
							<td>
								<input type='submit' name='button' id='button' value='OK' />
							</td>
						</tr>
					</table>					
				</form>";
		}
	}
}
?>

	<?php include "footer.php" ?>

</body>
</html>