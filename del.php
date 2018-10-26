<?php  
include('koneksi.php');
$del =$_GET['username'];
mysqli_query($db, "DELETE FROM data WHERE username='$del';");
header('location: DASHBOARD.php');
?>