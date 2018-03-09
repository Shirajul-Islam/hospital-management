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
<link rel="stylesheet" type="text/css" href="css/table.css">
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
<body style="background-color: white;">

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

<div class="container" style="margin-top:55px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:18px;">
  <img src="picture/ga.jpg" style="width: 800px;height: 460px;">
  <div style="text-align: justify; font-size: 16px">
  	<img src="picture/header.png" style="width: 1150px;height: 50px;">
  	<img src="picture/mam.jpg" style="width: 200px;height: 200px;">
  	I am very pleased to inform you all that our annual health bulletin is well prepared now and it is satisfactory enough to deliver the whole scenario of our hospital. Among 64 District of Bangladesh, Gaibandha is a densely populated district of 2.5 million resident. Most of the people of this locality is below standard socio-economic conditions and are deprived of quality life. As Gaibandha town and major portion of this district is far away from the national highway, it is called pocket district also. So, Private health service is also not rich here. That's why District hospital has to play the vital role in providing medical service to the great number of people in any situation. But Quality health service delivery is yet a challange in my hospital due to many reasons. We need to overcome some important constraints specially the acute human resource crisis as an immediate measure . The vacant post should be filled and manpower for 100 bedded hospital should be provided immediately . Our Doctors & Nurses need more training on IMCI & EmOC . All the repairable equipment should be repaired as soon as possible . MSR amount and storage facility is still inadequate. Despite having various limitations, Our hospital is always trying to provide quality health service to the people of Gaibandha . Comparative service data study of various sectors showing the development of medical service and it is obviously satisfactory. Finally I am very happy to publish this health bulletin of 2017 because this document will help us to compare our progress in upcoming years.
<div style="text-align: justify; float: right; margin-top: 20px;" >
Dr. mosnet Ara begum<br>
Superitendent<br>
Gaibandha District Hospital
</div>
  </div>

<div style="font-size: 16px">
	<img src="picture/header.png" style="width: 1150px;height: 50px;">

	<h2 style="text-align: center;">Basic Information</h2>

<table>
  <tr>
    <th>Name of the district</th>
    <th>Gaibandha</th>
  </tr>
  <tr>
  	<td>Organisation code</td>
  	<td>10001254</td>
  </tr>
<tr>
	<th>Name of the superintendent</th>
    <th>Dr. Mosnet Ara begum</th>
</tr>
<tr>
	<td>Land phone-1</td>
	<td>054161516</td>
</tr>
<tr>
	<th>Land phone-2</th>
	<th>N/A</th>
</tr>
<tr>
	<td>FAX no</td>
	<td>N/A</td>
</tr>
<tr>
	<th>Mobile phone</th>
	<th>01730324806</th>
</tr>
<tr>
	<td>Email</td>
	<td>gaibandha@hospi.dghs.gov.bd</td>
</tr>
<tr>
	<th>GPS location in the hospital</th>
	<th>Lati: 25.3291 And Long: 89.5370 </th>
</tr>
</table>

<div>
	<img src="picture/footer.jpg" style="width: 1160px;height: 55px;">
</div>
</div>
<nav class="navbar navbar-primary bg-primary" style="margin-top: 72px;">
 <div class="page-footer bg-teal text-default">
  <h4 class="display-center">All Copyright @ shirajul Islam</h4>
 </div>
</nav>
</div>
</body>
</html>