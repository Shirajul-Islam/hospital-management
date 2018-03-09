<?php
if (isset($_POST['save'])) {
  require("db.php");
  //$user = 'root';
  //$password = '';
  //$ip = 'localhost';
  //$dbname = 'mysqli_login';
  
  $name = $_POST['name'];
  $addr = $_POST['addr'];
  $spec = $_POST['spec'];
  $jdate = $_POST['jdate'];
  $no = $_POST['no'];
  $svisit = $_POST['stime'];
  $evisit = $_POST['etime'];
 

  //$connection_write = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $visibility = 1;
    $query = "INSERT INTO doctor (`name`, `address`, `specialist`,`join_date`,`mobile`,`visible`,`svisit`,`evisit`)
             VALUES('{$name}', '{$addr}','{$spec}', '{$jdate}','{$no}', '{$visibility}','{$svisit}','{$evisit}')";
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
	require("add-doctor.php");
 ?>