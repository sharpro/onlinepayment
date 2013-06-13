<!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" >
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/style9.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />  
		
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
 <style type="text/css">
	tr{
		height:40px;
	}
	td{
		padding:3px;
	}
</style>
 </head>
 <body>
 <header>
    <nav>   
	  <div id="logo"><a href="#"><img src="images/logo.png" alt="Logo here" /></a></div>  
    </nav>
</header>
	<div style="position:relative;left:400px;"><img src="images/admin.png" /></div>
	<div style="position:relative;left:420px;">
		<form class="form-horizontal" method = "post" action = "ctl/login.php">
		  <table>
			<tr>
				<td>
					<label class="control-label" for "inputusername"><b>Username</b></label>
				</td>
				<td>
					<input type="text" id="inputusername" name = "username" placeholder="Username">
				</td>
			</tr>
			<tr>
				<td>
					<label class="control-label" for="inputPassword"><b>Password</b></label>
				</td>
				<td>
					<input type="password" id="inputPassword" name = "password" placeholder="Password">
				</td>
			<tr>
				<td>
				</td>
				<td>
					<button type="submit" class="btn">Sign in</button>
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