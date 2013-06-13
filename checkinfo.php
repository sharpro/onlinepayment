<!DOCTYPE html>
<html>
  <head>
	
    <title>Checking Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" >
	<style>
		.typeinfo{
			position:relative;left:200px;
			top:20px;
			width:800px;
			height:100px;
			
		}
		.printinfo{
			position:relative;left:100px;
			width:1200px;
			height:auto;
			top:85px;
			padding:3px;
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
				<td style="width:400px;text-align:right;padding:3px"><label for "input1"><b>选择类型</b></label></td>
				<td style="padding:3px;"><label class = "checkbox inline" id = "input1">
					<input type = "radio" name = "typevalue" value = "1" checked /><b>用户</b>
					<input type = "radio" name = "typevalue" value = "2" /><b>管理员</b>
				</label>
				</td>
			</tr>
			<tr width="100px">
				<td style="width:400px;text-align:right;padding:3px"><label for "input2"><b>选择查询关键字</b></label></td>
				<td style="padding:3px;"><label class = "checkbox inline" id = "input2">
				<input type = "radio" name = "keyword" value = "1" checked /><b>用户名</b>
				<input type = "radio" name = "keyword" value = "2" /><b>姓名</b>
				<input type = "radio" name = "keyword" value = "3" /><b>身份证</b>
				<input type = "radio" name = "keyword" value = "4" /><b>ID</b>
				</label>
				</td>
			</tr>
			<tr width="100px">
				<td style="width:400px;text-align:right;padding:3px"><label for "input3"><b>输入关键词</b></label></td>
				<td style="padding:3px;">&nbsp&nbsp&nbsp<input type = "text" name = "keycontent" id = "input3"/></td>
			</tr>
			<tr width="50px">
				<td><input type="submit" class = "btn-info" name="button" id="button" value="查找" /></td>
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

	$table = 'user_info';
	
	switch($keyword){
		case 1: $entry = 'username';
			break;
		case 2: $entry = 'name';
			break;
		case 3: $entry = 'id_card';
			break;
		case 4: $entry = 'id';
			break;
		default:
			$entry = 'username';	
	}
	if (empty($content) and ($content != 0)){
		echo "<script>\r\n";   
		echo " alert(\"未输入关键字\");\r\n";   
		echo " location.replace(\"http://127.0.0.1/onlinepayment/checkinfo.php\")\r\n";   
		echo "</script>";   
		exit;
	}
	else {
		$conn=mysql_connect("localhost", "root", "");//connect to mysql 
		  mysql_select_db("wepay");//choose database
		if($type == 1)
		{
		   $sql = "SELECT * FROM `$table` WHERE `$entry` = '$content' AND manager = '0'";
		}
		else{
		   $sql= "SELECT * FROM `$table` WHERE `$entry` = '$content' AND (manager = '1' OR manager = '2')";
		}
		$query = mysql_query($sql, $conn);
		$num=mysql_num_rows($query);//get the number of correct records
		$cnt = 0;
		$row = mysql_fetch_array($query);
		if($num == 0)
		{
		   echo "<script>\r\n";   
		   echo " alert(\"未找到对应的条目\");\r\n";   
		   echo " location.replace(\"http://127.0.0.1/onlinepayment/checkinfo.php\")\r\n";   
		   echo "</script>";   
		   exit;
		}
		
		echo "<div class ='printinfo'><table class='table table-hover' style='position:relative;top:30px;left:20px;'>
						<tr>
							<td>id</td>
							<td>用户名</td>
							<td>姓名</td>
							<td>密码</td>
							<td>支付密码</td>
							<td>账户余额</td>
							<td>是否为管理员</td>
							<td>身份证</td>
							<td>email</td>
							<td>电话</td>
							<td>生日</td>
							<td>性别</td>
							<td>exp</td>
							<td>类型</td>
						</tr>";
		while ($num > $cnt){ //may be same name or password
			if($type == 1){  //for user
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['password']."</td>";
				echo "<td>".$row['spassword']."</td>";
				echo "<td>".$row['account']."</td>"; 
				echo "<td>用户</td>";
				echo "<td>".$row['id_card']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['phone']."</td>";
				echo "<td>".$row['birthday']."</td>";
				if($row['gender'] == 'm')
				{
				    echo "<td>男</td>";
				}
				elseif($row['gender'] == 'f')
                { 
				    echo "<td>女</td>";
                }				
				else
				{
				    echo "<td>".$row['gender']."</td>";				
				}	
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
				echo "<td>".$row['spassword']."</td>";
				echo "<td>".$row['account']."</td>";
                if($row['manager'] == 1)
                { 				
				   echo "<td>系统管理员</td>";
				}
				else
				{
				   echo "<td>在线支付管理员</td>";
				}
				echo "<td>".$row['id_card']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['phone']."</td>";
				echo "<td>".$row['birthday']."</td>";
				if($row['gender'] == 'm')
				{
				    echo "<td>男</td>";
				}
				elseif($row['gender'] == 'f')
                { 
				    echo "<td>女</td>";
                }				
				else
				{
				    echo "<td>".$row['gender']."</td>";				
				}	
				echo "<td>".$row['exp']."</td>";
				echo "<td>".$row['type']."</td>";
				echo "</tr>";
			}
			$cnt++;
			$row = mysql_fetch_array($query);
		}
		echo "</table></div>";
	}
}
?>
 <?php include "footer.php" ?>
</body>
</html>