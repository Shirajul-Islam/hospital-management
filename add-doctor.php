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
                <a href="me.php">Me</a>
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
                <a href="patient-report.php">Patient</a>
                <a href="doctor-report.php">Doctor</a>
              </div>
            </div>
           </li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href=""><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['username']; ?></a></li>
            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container" style="margin-top:90px;margin-left: 100px; text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
  <p>Hospital Management System</p>
</div>
    <div style="background-color:white; margin-left: 310px;width:800px; border-style:groove; border-color:#FF0099" align="center">
        <div style="background-color:#3366FF; width:794px; padding-top:1px; padding-bottom:1px;" align="center">
        <h3 style="color:#CC3300;"><b>Add New Doctors</b></h3></div>
         <hr>
<form method="post"  class="form-horizontal" role="form" align="center">
    <div class="form-group" align="center">
        <label class="control-label col-sm-4"  for="name">Name of the doctor</label>
        <div class="col-sm-6">
            <input type="text" name="name" placeholder="Enter doctor's name" required="true" class="form-control"/>
        </div>
    </div> 
    <div class="form-group">
        <label class="control-label col-sm-4" for="addr">Parmanent Address</label>
        <div class="col-sm-6">            
            <input type="text" name="addr" placeholder="Enter parmanent address" required="true" class="form-control"/> 
        </div>
    </div> 
    <div class="form-group">
        <label class="control-label col-sm-4" for="spec">Specialist</label>
        <div class="col-sm-6">            
            <input type="text" name="spec" placeholder="Specialized in" required="true" class="form-control"/> 
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-4" for="jdate">Join date</label>
        <div class="col-sm-6">            
            <input type="date" name="jdate" required="true" class="form-control"/> 
        </div>
    </div>
     <div class="form-group">
        <label class="control-label col-sm-4" for="jdate">Visiting hour</label>
        <div class="col-sm-6">            
            <input type="time" name="stime" required="true" class="form-control"/> to<input type="time" name="etime" required="true" class="form-control" /> 

        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-4" for="no">Contact number</label>
        <div class="col-sm-6">            
            <input type="number" name="no" placeholder="Enter mobile number" required="true" class="form-control"/> 
        </div>
    </div>

    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-8">  
          <input type="submit" name="save" value="Submit" class="btn btn-primary" />
         </div>
     </div>     
</form>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>