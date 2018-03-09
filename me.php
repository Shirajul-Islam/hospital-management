<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
  header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" type="text/css" href="css/s.css">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<style>
  .nav navbar-nav a:link,a:visited {
        display:block;
        font-weight:bold;
        color:#FFFFFF;
        width:133px;
        text-align:center;
        text-decoration:none;
</style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>
              <div class="dr">
              <span class="d">About &#9662;</span>
              <div class="dropdown-content">
                <a href="hospital.php" style="color: black;">Hospital</a>
                <a href="me.php" style="color: black;">Me</a>
              </div>
            </div>

            </li>
            <li><a href="doctor-insert.php">Add doctor</a></li>
            <li><a href="doctor-list.php">Doctor list</a></li>
            <li><a href="patient-insert.php">Add patient</a></li>
            <li><a href="patient-list.php">Patient list</a></li>
            <li><a href="appointment-insert.php"> Add appointment</a></li>
            <li><a href="appointment-list.php">Appointment list</a></li>
           <li><div class="dr">
              <span class="d">Report &#9662;</span>
              <div class="dropdown-content">
                <a href="patient-report.php" style="color: black;">Patient</a>
                <a href="doctor-report.php" style="color: black;""> Doctor</a>
              </div>
            </div>
           </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href=""><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['username']; ?></a></li>
            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container" style="margin-top:80px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:18px;">
  <h1 class="text-info">Welcome to visit my website !!!!</h1>

<img src="picture/pro.jpg" class="img-resposive img-circle" alt="profile pic" width="304" height="236">
<div  style="margin-top: 50px;">
  <p style="text-align: justify; font-size: 16px;">I am Md Shirajul Islam, son of Md Hafizur Rahaman. I am from Gaibandha, Sundarganj, Bangladesh. I am studying B.Sc. in Electronics & Communication Eingineering at Hajee Mohammad Danesh Science & Technology University, Dinajpur. I want to be a good web developer. It's my ambition. I like to search something new. If I mention about my hobby, I am fond of travelling and watching movie.  </p>
</div>
<nav class="navbar navbar-primary bg-primary" style="margin-top: 72px;">
 <div class="page-footer bg-teal text-default">
  <h4 class="display-center">All Copyright @ shirajul Islam</h4>
 </div>
</nav>
</div>
</body>
</html>