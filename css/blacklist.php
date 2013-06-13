<!DOCTYPE html>
<html>
  <head>
	
    <title>Checking Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" >
	<style>
		.blackinfo{
			position:relative;
			top:20px;
			left:220px;
			width:1000px;
			background:url(images/inputpanel2.png);
			cellpadding:3px;
		}
	</style>
		    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">	

 </head>
 <body>
 <?php include "header.php" ?>
 <?php
//global $user; 
	$conn=mysql_connect("localhost", "root", "");//connect to mysql 
	  mysql_select_db("wepay");//choose database
	$sql = "SELECT * FROM `user_info` WHERE `type` =  '0'";
	$query = mysql_query($sql, $conn);
	$num=mysql_num_rows($query);//get the number of correct records
	$cnt = 0;
	$row = mysql_fetch_array($query);
	echo "<table  border='1' class = 'blackinfo'>
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
	while ($num > $cnt){ 
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
		$cnt++;
		$row = mysql_fetch_array($query);
	}
	echo "</table>";
	//Add to blacklist
	echo "<form method ='post', action = 'ctl/addblacklist.php'>
			<table class = 'blackinfo'>
			<tr>
				<td>
					<b>Fill the id to Add</b>
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
	//delete member by ID
	echo "<form method ='post', action = 'ctl/delblacklist.php'>
		<table class = 'blackinfo'>
		<tr>
			<td>
				<b>Fill the id to delete</b>
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
 ?>
 <?php include "footer.php" ?>
</body>
</html>