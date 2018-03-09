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
  $query = "SELECT `name`,`address`,`gender`,`jdate`,`mobile` FROM patient WHERE `id`='{$id}'";
  $result = mysqli_query($con,$query);
  if ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    $name=$row['name'];
    $addres=$row['address'];
    $spec=$row['gender'];
    $join=$row['jdate'];
    $contrac =$row['mobile'];
  }
}else{
  echo "ERROR : Database connection failed !"."<br>";
}
mysqli_close($con);
require('update-patient.html');
//Update the data and Save it into the MySQL database;
if (isset($_POST['save'])) {
  //$user = 'root';
  //$password = '';
  //$ip = 'localhost';
  //$dbname = 'mysqli_login';

 $name = $_POST['name'];
  $addr = $_POST['addr'];
  $gen = $_POST['gen'];
  $jdate = $_POST['jdate'];
  $no = $_POST['mobile'];

  //$connection_write = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $visibility = 1;
    $query = "UPDATE patient SET `name`='{$name}',`address`='{$addr}',
             `gender`='{$gen}', `jdate`='{$jdate}',`mobile`='{$no}' WHERE `id`='{$id}' ";
    if(mysqli_query($con, $query)){
      echo "<b><script>alert('SUCCESS : Data update successfully');</script></b>";
      echo "<script>window.location.href = 'patient-list.php'</script>";
    }else{
      echo "Database Insert Failed";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
  mysqli_close($con);
}
?>