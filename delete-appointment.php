<?php
require("db.php");
//$user = 'root';
//$password = '';
//$ip = 'localhost';
//$dbname = 'mysqli_login';

//$connection_delete = mysqli_connect($ip, $user, $password, $dbname);
$id = $_GET['id'];
if (!mysqli_connect_errno()){
  $visibility = 0;
  $update_query = "UPDATE appointment SET `visible`= '{$visibility}' WHERE `id`='{$id}' ";
  if (mysqli_query($con,$update_query)) {
    echo "<script>window.location.href = 'appointment-list.php'</script>";
  }else{
    echo "ERROR : failed to Delete data"."<br>";
  }
}else{
  echo "ERROR : Database connection failed !"."<br>";
}
mysqli_close($con);
?>
