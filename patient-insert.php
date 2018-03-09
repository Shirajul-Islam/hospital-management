<?php
require("db.php");
if (isset($_POST['save'])) {

//  $user = 'root';
//  $password = '';
//  $ip = 'localhost';
//  $dbname = 'mysqli_login';
  
  $name = $_POST['name'];
  $addr = $_POST['addr'];
  $gen = $_POST['gen'];
  $jdate = $_POST['jdate'];
  $room = $_POST['room'];
  $no = $_POST['mobile'];
 

  //$connection_write = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $visibility = 1;
    $query = "INSERT INTO patient (`name`, `address`, `gender`,`jdate`,`room_no`,`mobile`,`visible`)
             VALUES('{$name}', '{$addr}','{$gen}', '{$jdate}','{$room}','{$no}', '{$visibility}')";
    if(mysqli_query($con, $query)){
echo "<script>
  alert('Data added successfully')
  </script>";
    
    }else{
      echo "Database Insert Failed";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
   }
  mysqli_close($con);
  }
	require("add-patient.php");
 ?>