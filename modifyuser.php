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
   echo "<form class='form-horizontal' name = 'input' method = 'post' action = 'ctl/updateuser.php'>
         <table>
		   <tr>
           		<td><label class = ��control-label' for 'inputid'>ID</label></td>
              	<td><input name = 'id' id = 'inputid' type = 'text' readonly = 'readonly' value = ".$row['id']."></td>
			    <td><label class = 'control-label' for 'inputusername'>username</label></td>
				<td><input name = 'username' id = 'inputusername' type = 'text'readonly = 'readonly' value = ".$row['username']."></td>
			</tr>
		    <tr>
           		<td><label class = ��control-label' for 'inputid'>���֤</label></td>
              	<td><input name = 'id_card' id = 'inputid' type = 'text' value = ".$row['id_card']."></td>
			    <td><label class = 'control-label' for 'inputemail'>email</label></td>
				<td><input name = 'email' id = 'inputemail' type = 'text' value = ".$row['email']."></td>
			</tr>
			<tr>
           		<td><label class = ��control-label' for 'inputname'>����</label></td>
              	<td><input name = 'name' id = 'inputname' type = 'text' value = ".$row['name']."></td>
			    <td><label class = 'control-label' for 'inputphone'>�绰</label></td>
				<td><input name = 'phone' id = 'inputphone' type = 'text' value = ".$row['phone']."></td>
			</tr>
			<tr>
           		<td><label class = ��control-label' for 'inputspassword'>֧������</label></td>
              	<td><input name = 'spassword' id = 'inputspassword' type = 'text' value = ".$row['spassword']."></td>
			    <td><label class = 'control-label' for 'exp'>����ֵ</label></td>
				<td><input name = 'exp' id = 'inputaccount' type = 'text' value = ".$row['exp']."></td>
			</tr>
			<tr>
           		<td><label class = ��control-label' for 'inputpassword'>����</label></td>
              	<td><input name = 'password' id = 'inputpassword' type = 'text' value = ".$row['password']."></td>
			    <td><label class = 'control-label' for 'inputgender'>�Ա�</label></td>
				<td>";
			if($row['gender'] == 'm')
			{echo"
				    <select name = 'gender'>
					    <option value = 'm' selected = 'selected'>��</option>
						<option value = 'f'>Ů</option>
					</select>
				</td>
			</tr>";
			}
			elseif($row['gender'] == 'f'){
			echo" 
			        <select name = 'gender'>
					    <option value = 'm' >��</option>
						<option value = 'f'selected = 'selected'>Ů</option>
					</select>
				</td>
			</tr>";
			}
			else
			{echo"    
			        <select name = 'gender'>
					    <option></option>
					    <option value = 'm'>��</option>
						<option value = 'f'>Ů</option>
					</select>
				</td>
			</tr>";
			}
		echo"<tr>
           		<td><label class = ��control-label' for 'inputbirthday'>����</label></td>
              	<td><input name = 'birthday' id = 'inputbirthday' type = 'text' value = ".$row['birthday']."></input></td>
			    <td><label class = 'control-label' for 'inputmanager'>�û�����</label></td>
				<td>";
			if($row['type'] == 'buyer'){
			echo" <select name = 'type'>
			        <option value ='buyer' selected = 'selected'>���</option>
					<option value ='seller'>����</option>
					<option value ='vip user'>VIP�û�</option>
					<option value = 'auditor'>���Ա</option>
					<option value = 'blacklist user'>�������û�</option>
				  </select>
				  </td>
			</tr>";
			}
			elseif($row['type'] == 'seller'){
			echo"<select name = 'type'>
			        <option value ='buyer' >���</option>
					<option value ='seller'selected = 'selected'>����</option>
					<option value ='vip user'>VIP�û�</option>
					<option value = 'auditor'>���Ա</option>
					<option value = 'blacklist user'>�������û�</option>
				  </select>
				  </td>
			</tr>";
			}
			elseif($row['type']== 'vip user'){
			echo"<select name = 'type'>
			        <option value ='buyer' >���</option>
					<option value ='seller'>����</option>
					<option value ='vip user' selected = 'selected'>VIP�û�</option>
					<option value = 'auditor'>���Ա</option>
					<option value = 'blacklist user'>�������û�</option>
				  </select>
				  </td>
			</tr>";
			}
			elseif($row['type'] == 'auditor')
			{
			echo"<select name = 'type'>
			        <option value ='buyer' >���</option>
					<option value ='seller'>����</option>
					<option value ='vip user' >VIP�û�</option>
					<option value = 'auditor'selected = 'selected'>���Ա</option>
					<option value = 'blacklist user'>�������û�</option>
				  </select>
				  </td>
			</tr>";
			}
			else{
			echo "<select name = 'type'>
			        <option value ='buyer' >���</option>
					<option value ='seller'>����</option>
					<option value ='vip user' >VIP�û�</option>
					<option value = 'auditor'>���Ա</option>
					<option value = 'blacklist user'selected = 'selected'>�������û�</option>
				  </select>
				  </td>
			</tr>";
			}
         echo"<tr>
                  <td></td>
				  <td><input type = 'submit' class = 'btn-info' name = 'button' id = 'button' value = '����'/></td>
				  <td><input type = 'button' onclick = 'javascript:window.close();' class = 'btn-inverse' name = 'button1' id = 'button1' value = '�ر�'/></td>
				  <td></td>
            </tr>
			</table>
			</form>";
                  				  
   ?>
	