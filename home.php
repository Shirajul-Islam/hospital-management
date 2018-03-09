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
<style type="text/css">
  .clock{
    height:30px;
    width:150px;
    font-family:lobster-two;
    margin-top: 25px;
    line-height: 5px;
    position: absolute;
    font-size:17px;
    color:green;

    }
</style>

  <script src="js/js/hovertext.js"></script>
  <script src="js/js/jquery.lettering.js"></script>      

  <script src="js/js/modernizr-1.7.min.js"></script>
  <script src="js/js/color.js"></script>
  <script src="js/js/textshadow.js"></script>
  <link rel="stylesheet" type="text/css" href="engine1//style.css" media="screen" />
  <script type="text/javascript" src="engine1//jquery.js"></script>
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
<div class="page-header bg-blue">
    <p class="text-success">Welcome to</p>
    <p class="text-info">Hospital Management System</p>

</div>
</div>
<div class="campusslide">
  <div id="wowslider-container1">
  <div class="ws_images"><ul>
<li><img src="picture/gai.jpg" alt="Hospital" title="Gaibandha Hospital" id="wows1_0"</li>
<li><img src="picture/1.jpg" alt="pic-1"/></li>
<li><img src="picture/2.jpg" alt="pic-2"/></li>
<li><img src="picture/3.jpg" alt="pic-3" id="wows1_3"/></li>
<li><img src="picture/5.jpg" alt="pic-5" id="wows1_4"/></li>
<li><img src="picture/6.jpg" alt="pic-6" id="wows1_5"/></li>
<li><img src="picture/7.jpg" alt="pic-6" id="wows1_6"/></li>
</ul>
</div>
<script type="text/javascript" src="engine1/swfobject.js"></script>
</div>
  <script type="text/javascript" src="engine1//wowslider.js"></script>
  <script type="text/javascript" src="engine1//script.js"></script>
</div>
</div>
</div>
<nav class="navbar navbar-primary bg-primary">
 <div class="page-footer bg-teal text-default">
  <h4 align="center">All Copyright @ shirajul Islam</h4>
 </div>
</nav>
</body>
</html>