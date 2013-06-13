<!DOCTYPE html>
<html>
  <head>
	
    <title>Checking Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" >
	<style>
		.typeinfo{
			position:relative;left:320px;
			top:20px;
			width:800px;
			height:200px;
			background:url(images/inputpanel1.png);
		}
		.printinfo{
			position:relative;left:320px;
			width:800px;
			height:200px;
			top:50px;
			padding:3px;
			background:url(images/inputpanel1.png);
		}
	</style>
		    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">	

 </head>
 <body>
 <?php include "header.php" ?>

<fieldset>
	<div  class = "typeinfo">
	<form method = "post" action = "checkinfo.php">
		<table style="position:relative;top:30px;">
			<tr width="100px">
				<td style="width:400px;text-align:right;padding:3px"><label for "input1"><b>Please select a type</b></label></td>
				<td style="padding:3px;"><label class = "checkbox inline" id = "input1">
					<input type = "radio" name = "typevalue" value = "1" checked /><b>user</b>
					<input type = "radio" name = "typevalue" value = "2" /><b>administrator</b>
				</label>
				</td>
			</tr>
			<tr width="100px">
				<td style="width:400px;text-align:right;padding:3px"><label for "input2"><b>Please select a key</b></label></td>
				<td style="padding:3px;"><label class = "checkbox inline" id = "input2">
				<input type = "radio" name = "keyword" value = "1" checked /><b>username</b>
				<input type = "radio" name = "keyword" value = "2" /><b>password</b>
				<input type = "radio" name = "keyword" value = "3" /><b>name</b>
				<input type = "radio" name = "keyword" value = "4" /><b>id</b>
				</label>
				</td>
			</tr>
			<tr width="100px">
				<td style="width:400px;text-align:right;padding:3px"><label for "input3"><b>Please enter the content</b></label></td>
				<td style="padding:3px;">&nbsp&nbsp&nbsp<input type = "text" name = "keycontent" id = "input3"/></td>
			</tr>
			<tr width="50px">
				<td><input type="submit" name="button" id="button" value="submit" /></td>
			</tr>
		</table>
	</form>
	<div>
</fieldset>
<?php
//global $user; 
if($_POST){
	$type = $_POST['typevalue'];
	$keyword = $_POST['keyword'];
	$content = $_POST['keycontent'];

	if($type == 1){
		$table = 'user_info';
	}
	else{
		$table = 'admin_id';
	}
	switch($keyword){
		case 1: $entry = 'username';
			break;
		case 2: $entry = 'password';
			break;
		case 3: $entry = 'name';
			break;
		case 4: $entry = 'id';
			break;
		default:
			$entry = 'username';	
	}
	if (empty($table) || empty($entry) || empty($content)){
		echo "<script>\r\n";   
		echo " alert(\"no empty textfield is allowed \");\r\n";   
		echo " location.replace(\"http://127.0.0.1/onlinepayment/checkinfo.php\")\r\n";   
		echo "</script>";   
		exit;
	}
	else {
		$conn=mysql_connect("localhost", "root", "");//connect to mysql 
		  mysql_select_db("wepay");//choose database
		$sql = $sql = "SELECT * FROM `$table` WHERE `$entry` = '$content'";
		$query = mysql_query($sql, $conn);
		$num=mysql_num_rows($query);//get the number of correct records
		$cnt = 0;
		$row = mysql_fetch_array($query);
		while ($num > $cnt){ //may be same name or password
			if($type == 1){  //for user
				echo "<div class = 'printinfo'><table border='1' style='position:relative;top:30px;left:50px;'>
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
				echo "</tr>
					</table></div>";
			}
			else{				//for administrator
				echo "<div class ='printinfo'><table border = '1' style='position:relative;top:30px;left:100px;'>
						<tr>
							<td style='width:150px;'>id</td>
							<td style='width:150px;'>username</td>
							<td style='width:150px;'>name</td>
							<td style='width:150px;'>password</td>
						</tr>";
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['password']."</td>";
				echo "</tr>
					</table></div>";
			}
			$cnt++;
			$row = mysql_fetch_array($query);
		}
	}
}
?>
 <?php include "footer.php" ?>
</body>
</html>