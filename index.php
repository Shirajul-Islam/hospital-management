<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT user_id, email, password FROM tbl_users WHERE email='$email'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['user_id'];
		header("Location: home.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
	$DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="css/style.css" type="text/css" />
<style>
	body{
 	background-color: #474e5d;
      color: #ffffff;
 }
</style>
</head>
<body>

<div class="signin-form">

	<div class="container">
	<nav class="navbar">
    <div class="navbar-header">
    	<div style="float: right; margin-left: 1000px">
    		<img src="picture/logo.png" height="60px" width="150px">
    	</div>
    <h1 style="margin-left: 325px;">Hospital Management System</h1>
    <div style="float: left;">
    <img src="picture/pro.jpg" style="width: 200px;height: 200px;border-radius: 100px; margin-top: -449px;">
</div>
    <div style="margin-top: -90px;margin-left: 15px;">
    
   <p style="margin-top: 140px; margin-left: 10px;"> Name : Md Shiraul Islam<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Institute: <abbr title="Hajee Mohammad Danesh Science & Technology University">HSTU</abbr></p>
</div>
</div>
</nav>
<div style="margin-top: -80px;">
	
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Sign In.</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
        	<label>Email-Address:</label>
        <input type="email" class="form-control" placeholder="Enter email address" name="email" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        	<label>Password:</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
            
            <a href="register.php" class="btn btn-primary" style="float:right;">Sign UP Here</a>
            
        </div>       
      </form>
</div>
 </div>
</div>
</body>
</html>