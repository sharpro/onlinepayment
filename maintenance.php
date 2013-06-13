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

			cellpadding:3px;
		}
		.mainprint{
			position:relative;
			top:20px;
			width:1000px;
			height:100px;
			cellpadding:3px;
		}
		.mainprint2{
			position:relative;
			top:20px;
			width:1000px;
			height:100px;
			cellpadding:3px;
			font-size:20px;
		}
		.mainprint3{
			position:relative;
			top:20px;
			width:1000px;
			height:1400px;
			cellpadding:3px;
			font-size:20px;
		}
		.mainprint4{
			position:relative;
			top:20px;
			width:1000px;
			height:400px;
			cellpadding:3px;
			font-size:20px;
		}
	</style>
	<meta charset="utf-8" >
		    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>

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
					<label><b>选择类型<b></label>
				</td>
				<td style="width:150px;text-align:left;padding:3px;">
					<select name = "typevalue">
					    <option></option>
                        <option value = "1">用户</option>
                        <option value = "2">管理员</option>
                        
                    </select>
				</td>
				<td style="width:200px;text-align:left;padding:3px;">
						<input type="submit" class = "btn-success" name="button" id="button" value="OK" />
					</td>
				</tr>
			<table>
		</form>
	</div>
</fieldset>
<script LANGUAGE="javascript"> 
<!-- 
function openwin(id) { 

window.open ("modifyad.php?id="+id, "newwindow", "height=300, ScreenX= 400 , ScreenY = 200,width=650, toolbar=no,menubar=no, scrollbars=no, resizable=no, location=no, status=no") 
//写成一行 
} 
function openwin2(id) { 

window.open ("modifyuser.php?id="+id, "newwindow", "height=300, ScreenX= 400 , ScreenY = 200,width=650, toolbar=no,menubar=no, scrollbars=no, resizable=no, location=no, status=no") 
//写成一行 
} 
//--> 
</script> 

<?php
//global $user; 
if($_POST || $_GET){
    if($_POST)
	$type = $_POST['typevalue'];
    elseif($_GET){
	$type = $_GET['type'];
	}
	$table = 'user_info';

	if (empty($type)){
		echo "<script>\r\n";   
		echo " alert(\"请选择类型\");\r\n";   
		echo "</script>";   
		exit;
	}
	else {
		$conn=mysql_connect("localhost", "root", "");//connect to mysql 
		  mysql_select_db("wepay");//choose database
        if($type == 1)
		{
		    $sql = "SELECT * FROM `$table` where manager = '0'";
		}
		elseif($type == 2)
		{
		    $sql = "SELECT * FROM `$table` where manager = '1' OR manager = '2'";
		}
		$query = mysql_query($sql, $conn);
		$num=mysql_num_rows($query);//get the number of correct records
		$cnt = 0;
		$row = mysql_fetch_array($query);
		
		echo "<form  name = 'input',method ='post', action = 'ctl/deleteuser.php'>
		<table  class = 'table table-hover';>
			<tr>";
	    if($type == 1)
        {echo"		<td>id</td>
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
		}
		else{
		echo"
		<td>id</td>
				<td>用户名</td>
				<td>姓名</td>
				<td>密码</td>
				<td>管理员类型</td>
				<td>身份证</td>
				<td>email</td>
				<td>电话</td>
				<td>生日</td>
				<td>性别</td></tr>";

		}
		
		while ($num > $cnt){ //may be same name or password
			if($type == 1){  //for user
			    $id = $row["id"];
				
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
				echo "<td><button class = 'btn-danger' type='submit' name = 'id' 
				value = '".$id."'  formaction = 'ctl/deleteuser.php'>删除</button></td>";
				echo "<td><button class = 'btn-primary' type='button' onclick = 'openwin2(".$id.")'>编辑</button></td>";
				echo "</tr>";
					
			}
			elseif($type == 2){				//for administrator
				echo "<tr>";
				$id = $row['id'];
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['password']."</td>";
				if($row['manager'] == 1){
				    echo "<td>系统管理员</td>";
				}
				else{
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
				echo "<td><button class = 'btn-danger' type='submit' name = 'id' 
				value = '".$id."'  formaction = 'ctl/deleteuser.php'>删除</button></td>";
				echo "<td><button class = 'btn-primary' type='button' onclick = 'openwin(".$id.")'>编辑</button></td>";
				
				
		    echo "</tr>";   
			}
			$cnt++;
			$row = mysql_fetch_array($query);
		}
		echo "</table></form>";
		
		//update the information
     /*	if($type == 1){
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
		}*/
	}
}
?>

	<?php include "footer.php" ?>

</body>
</html>