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
<link rel="stylesheet" href="css/w3.css">
<style type="text/css">
  .clock{
    height:30px;
    width:150px;
    font-family:lobster-two;
    margin-top: 25px;
    line-height: 5px;
    position: absolute;
    font-size:17px;
    color:white;

    }
</style>
    <script>
   $(function() {
     
    // apply spans
      $("h2").lettering();
      
      // hack to get animations to run again
      $(".redraw").click(function() { 
        var el = $(this),  
           prev = el.prev(),
           newone = prev.clone();
        el.before(newone);
        $("." + prev.attr("class") + ":first").remove();
      }); 
        
    var text = $("#jquerybuddy"),
      numLetters = text.find("span").length;
    
    function randomBlurize() {
    text.find("span:nth-child(" + (Math.floor(Math.random()*numLetters)+1) + ")")
        .animate({
          'textShadowBlur': Math.floor(Math.random()*25)+4,
          'textShadowColor': 'rgba(0,100,0,' + (Math.floor(Math.random()*200)+55) + ')'
        });
    // Call itself recurssively
    setTimeout(randomBlurize, 100);
    } // Call once
    randomBlurize();

   });
  </script>
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
            <li><a href="add-appointment.php"> Add appointment</a></li>
            <li><a href="appointment-list.php">Appointment list</a></li>
            <li>
              <div class="dr">
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

<div class="container" style="margin-top:40px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
  <div class="clock">
      <p id="demo"></p>
      <script>
      var myVar=setInterval(function(){myTimer()},1000);

      function myTimer()
      {
      var d=new Date();
      var t=d.toLocaleTimeString();
      document.getElementById("demo").innerHTML = d.toDateString();
      }
    </script>
  </div>
  </div>
<?php
require("db.php");
require("report.php");
//READ DATA FROM DATABASE USING PHP
if (isset($_POST['submit'])) {

//$user = 'root';
//$password = '';
//$ip = 'localhost';
//$dbname = 'mysqli_login';

$fdate = $_POST['fdate'];
$edate = $_POST['edate'];

//$connection_read = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $query = "SELECT `id`,`name`,`jdate` FROM patient WHERE `jdate` BETWEEN '{$fdate}' AND '{$edate}' ";
    $result = mysqli_query($con, $query);
    if($result){
      echo "<table id='tbl'>
    <tr>
      <th>Sl. No.</th>
      <th>Name</th>
      <th>Admit date</th>
    </tr>";
    $sl_no = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
      $sl_no = $sl_no + 1;
      echo "<tr>";
      echo "<td>".$sl_no."</td>";
      echo "<td>".ucwords($row['name'])."</td>";
      echo "<td>".$row['jdate']."</td>";
      echo "</tr>";
  }
  echo "</table>";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
  mysqli_close($con);
}
?>
<?php 
require("db.php");
//require("report.php");
//READ DATA FROM DATABASE USING PHP
if (isset($_POST['count'])) {

//$user = 'root';
//$password = '';
//$ip = 'localhost';
//$dbname = 'mysqli_login';

$fdate = $_POST['fdate'];
$edate = $_POST['edate'];

//$connection_read = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $query = "SELECT count('name') as count from patient where jdate between '{$fdate}' and '{$edate}'";
    $result = mysqli_query($con, $query);
    if($result){
      echo "<table id='tbl'>
    <tr>
      <th>The number of patient</th>
    </tr>";
    $sl_no = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
      echo "<tr>";
      echo "<td>".ucwords($row['count'])."</td>";
      echo "</tr>";
  }
  echo "</table>";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
  mysqli_close($con);
}
?>
<?php 
require("db.php");
//require("report.php");
//READ DATA FROM DATABASE USING PHP
if (isset($_POST['coun'])) {

//$user = 'root';
//$password = '';
//$ip = 'localhost';
//$dbname = 'mysqli_login';

//$connection_read = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $query = "SELECT count('name') as total from patient";
    $result = mysqli_query($con, $query);
    if($result){
      echo "<table id='tbl'>
    <tr>
      <th>Total number of patients</th>
    </tr>";
    $sl_no = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
      echo "<tr>";
      echo "<td>".ucwords($row['total'])."</td>";
      echo "</tr>";
  }
  echo "</table>";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
  mysqli_close($con);
}
?>

</body>
</html>