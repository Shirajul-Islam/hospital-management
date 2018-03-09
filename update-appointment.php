<?php
require("db.php");
$id = $_GET['id'];
//$user = 'root';
//$password = '';
//$ip = 'localhost';
//$dbname = 'mysqli_login';

//$connection_update = mysqli_connect($ip, $user, $password, $dbname);
$id = $_GET['id'];
if (!mysqli_connect_errno()){
  $query = "SELECT `pname`,`dname`,`adate`,`time` FROM appointment WHERE `id`='{$id}'";
  $result = mysqli_query($con,$query);
  if ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    $pname=$row['pname'];
    $dname=$row['dname'];
    $adate=$row['adate'];
    $atime=$row['time'];

  }
}else{
  echo "ERROR : Database connection failed !"."<br>";
}
mysqli_close($con);
require('update-appointment.html');
//Update the data and Save it into the MySQL database;
if (isset($_POST['save'])) {
  require("db.php");
  //$user = 'root';
  //$password = '';
  //$ip = 'localhost';
  //$dbname = 'mysqli_login';

  $name = $_POST['pname'];
  $namee = $_POST['dname'];
  
  $adatee = $_POST['adate'];
  $atimee = $_POST['time'];
 
  //$connection_write = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $visibility = 1;
    $query = "UPDATE appointment SET `pname`='{$name}',`dname`='{$namee}',`adate`='{$adatee}',`time` ='{$atimee}' WHERE `id`='{$id}' ";
    if(mysqli_query($con, $query)){
      echo "<b><script>alert('SUCCESS : Data update successfully');</script></b>";
      echo "<script>window.location.href = 'appointment-list.php'</script>";
    }else{
      echo "Database Insert Failed";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
  mysqli_close($con);
}
?>
