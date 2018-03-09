<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
	
	$uname = strip_tags($_POST['username']);
	$email = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	
	$uname = $DBcon->real_escape_string($uname);
	$email = $DBcon->real_escape_string($email);
	$upass = $DBcon->real_escape_string($upass);
	
	$hashed_password = password_hash($upass, PASSWORD_DEFAULT); 
	
	$check_email = $DBcon->query("SELECT email FROM tbl_users WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if ($count==0) {
		
		$query = "INSERT INTO tbl_users(username,email,password) VALUES('$uname','$email','$hashed_password')";

		if ($DBcon->query($query)) {
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
		}else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
		
	} else {
		
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
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
 h1,h4{
 	text-align: center;
 }

</style>

</head>
<body>

    <div class="container">

   <nav class="navbar">
    <div class="navbar-header">
    	<div style="float: right; margin-left: 1000px">
    		<img src="picture/logo.png" height="60px" width="150px" style="margin-top: 30px">
    	</div>
    <h1 style="margin-left: 30px; margin-top: 20px;">Hospital Management System</h1><div style="margin-top: 40px;">

    <img src="picture/pro.jpg" style="width: 200px;height: 200px;border-radius: 100px; margin-top: -449px;"></div>
    <div style="margin-top: -90px;margin-left: 15px;">
    
   <p style="margin-top: 140px; margin-left: -60px;"> Name : Md Shiraul Islam<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Institute: <abbr title="Hajee Mohammad Danesh Science & Technology University">HSTU</abbr></p>
</div>
</div>
</nav>

<div class="signin-form" style="margin-top: -90px;" >

	<div class="container" >
     
        
       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
          
        <div class="form-group">
        	<label>Username:</label>
        	
        <input type="text" class="form-control" placeholder="Enter your name" name="username" required  />
        </div>
        
        <div class="form-group">
        	<label>Email-address:</label>
        <input type="email" class="form-control" placeholder="Enter email address" name="email" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        	<label>Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="password" required  />
         </div>
        
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
            <a href="index.php" class="btn btn-primary" style="float:right;">Log In Here</a>
        </div> 
      </form>

    </div>
    
</div>

</body>
</html>