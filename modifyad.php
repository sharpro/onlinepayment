<!DOCTYPE html>
<html>
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" type="text/css" />	
	<style type="text/css">
	input[type="submit"]{
          width:120px;
          margin-left:35px;
          display:block;
          font-family: Verdana, Arial;
          position:relative;left:50px;
        }
	input[type="button"]{
          width:120px;
          margin-left:35px;
          display:block;
          font-family: Verdana, Arial;
          position:relative;left:50px;
        }
    </style>

<?php
   $id = $_GET["id"];
   $conn=mysql_connect("localhost", "root", "");
   mysql_select_db("wepay");//choose database
   $sql = "SELECT * FROM `user_info` where id = '$id' ";
   $query = mysql_query($sql, $conn);
   $row = mysql_fetch_array($query);
   echo "<form class='form-horizontal' name = 'input' method = 'post' action = 'ctl/updateadmin.php'>
         <table>
		 
		    <tr>
           		<td><label class = ’control-label' for 'inputid'>ID</label></td>
              	<td><input name = 'id' id = 'inputid' type = 'text' readonly = 'readonly' value = ".$row['id']."></td>
			    <td><label class = 'control-label' for 'inputusername'>username</label></td>
				<td><input name = 'username' id = 'inputusername' type = 'text'readonly = 'readonly' value = ".$row['username']."></td>
			</tr>
		    <tr>
           		<td><label class = ’control-label' for 'inputidcard'>身份证</label></td>
              	<td><input name = 'id_card' id = 'inputidcard' type = 'text' value = ".$row['id_card']."></td>
			    <td><label class = 'control-label' for 'inputemail'>email</label></td>
				<td><input name = 'email' id = 'inputemail' type = 'text' value = ".$row['email']."></td>
			</tr>
			<tr>
           		<td><label class = ’control-label' for 'inputname'>姓名</label></td>
              	<td><input name = 'name' id = 'inputname' type = 'text' value = ".$row['name']."></td>
			    <td><label class = 'control-label' for 'inputphone'>电话</label></td>
				<td><input name = 'phone' id = 'inputphone' type = 'text' value = ".$row['phone']."></td>
			</tr>
			<tr>
           		<td><label class = ’control-label' for 'inputpassword'>密码</label></td>
              	<td><input name = 'password' id = 'inputpassword' type = 'text' value = ".$row['password']."></td>
			    <td><label class = 'control-label' for 'inputgender'>性别</label></td>
				<td>";
			if($row['gender'] == 'm')
			{echo"
				    <select name = 'gender'>
					    <option value = 'm' selected = 'selected'>男</option>
						<option value = 'f'>女</option>
					</select>
				</td>
			</tr>";
			}
			elseif($row['gender'] == 'f'){
			echo" 
			        <select name = 'gender'>
					    <option value = 'm' >男</option>
						<option value = 'f'selected = 'selected'>女</option>
					</select>
				</td>
			</tr>";
			}
			else
			{echo"    
			        <select name = 'gender'>
					    <option></option>
					    <option value = 'm'>男</option>
						<option value = 'f'>女</option>
					</select>
				</td>
			</tr>";
			}
		echo"<tr>
           		<td><label class = ’control-label' for 'inputbirthday'>生日</label></td>
              	<td><input name = 'birthday' id = 'inputbirthday' type = 'text' value = ".$row['birthday']."></td>
			    <td><label class = 'control-label' for 'inputmanager'>管理员类型</label></td>
				<td>";
			if($row['manager'] == '1'){
			echo" <select name = 'manager'>
			        <option value ='1' selected = 'selected'>系统管理员</option>
					<option value ='2'>在线支付管理员</option>
				  </select>
				  </td>
			</tr>";
			}
			else{
			echo"<select name = 'manager'>
			        <option value ='1'>系统管理员</option>
					<option value ='2'selected = 'selected'>在线支付管理员</option>
				  </select>
				  </td>
				  </tr>";
			}
         echo"<tr>
                  <td></td>
				  <td><input type = 'submit' class = 'btn-info' name = 'button' id = 'button' value = '保存'/></td>
				  <td><input type = 'button' onclick = 'javascript:window.close();' class = 'btn-inverse' name = 'button1' id = 'button1' value = '关闭'/></td>
				  <td></td>
            </tr>
			</table>
			</form>";
                  				  
   ?>
	