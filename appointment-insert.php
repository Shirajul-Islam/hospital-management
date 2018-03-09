<?php
if (isset($_POST['save'])) {
  require("db.php");
  // $user = 'root';
  //$password = '';
  //$ip = 'localhost';
  //$dbname = 'mysqli_login';
  
  $pname = $_POST['pname'];
  $dname = $_POST['dname'];
  $adate = $_POST['adate'];
  $atime = $_POST['time'];
  
 

  //$con = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $visibility = 1;
    $query = "INSERT INTO appointment (`pname`, `dname`,`adate`,`visible`,`time`)
             VALUES('{$pname}', '{$dname}', '{$adate}','{$visibility}','{$atime}')";
    if(mysqli_query($con, $query)){
      echo "<script>
  alert('Data update successfully')
  </script>";
    
   
    }else{
      echo "Database Insert Failed";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
   }
  mysqli_close($con);
  }
	require("add-appointment.php");
 ?>