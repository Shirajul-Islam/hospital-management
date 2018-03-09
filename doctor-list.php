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
<link rel="stylesheet" href="css/crudapp_style.css" type="text/css" />
<link rel="stylesheet" href="css/crudapp_update.css" type="text/css" />

  <style>
  .btn-glyphicon {
padding:8px;
background:#ffffff;
margin-right:4px;
}
.icon-btn {
padding: 1px 15px 3px 2px;
border-radius:50px;
}
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
                <a href="me.php">Me</a>
              </div>
            </div>
            </li>
            <li><a href="add-doctor.php">Add doctor</a></li>
            <li><a href="doctor-list.php">Doctor list</a></li>
            <li><a href="add-patient.php">Add patient</a></li>
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
    <div class="container" style="margin-top:100px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
    <p>Hospital Management System</p>
    <h3 style="color: #A52A2A"> The list of the doctors</h3>

</div>
</body>
<?php
require("db.php");
//READ DATA FROM DATABASE USING PHP
//$user = 'root';
//$password = '';
//$ip = 'localhost';
//$dbname = 'mysqli_login';
//$connection_read = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $query = "SELECT * FROM doctor WHERE `visible` = 1";
    $result = mysqli_query($con, $query);
    if($result){
      echo "<table id='tbl'>
    <tr>
      <th>Sl. No.</th>
      <th>Unique ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Specialist</th>
      <th>Join date</th>
      <th>Contract</th>
      <th>Update Record</th>
      <th>Delete Record</th>
    </tr>";
    $sl_no = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
      $sl_no = $sl_no + 1;
      $id = $row['id'];
      echo "<tr>";
      echo "<td>".$sl_no."</td>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".ucwords($row['name'])."</td>";
      echo "<td>".$row['address']."</td>";
      echo "<td>".$row['specialist']."</td>";
      echo "<td>".$row['join_date']."</td>";
      echo "<td>".$row['mobile']."</td>";
      echo "<td>"."<a href = 'update-doctor.php?id=$id' id='update'>EDIT</a>"."</td>";
      echo "<td>"."<a href = 'delete-doctor.php?id=$id' id='delete'>DEL</a>"."</td>";
      echo "</tr>";
  }
  echo "</table>";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
  mysqli_close($con);
?>

</body>
</html>