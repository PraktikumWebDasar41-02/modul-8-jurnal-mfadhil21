<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<input type="text" name="username" placeholder="username anda.."><br>
		<input type="password" name="password" placeholder="password anda.."><br>
		<input type="submit" name="submit" value="MASUK">
		<br><br>
		<a href="register.php">anda belum mendaftar?</a>
	</form>
</body>
</html>

<?php  
session_start();
include('koneksi.php');
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = ($_POST['password']);
  if(empty($username)){
      echo "Username masih kosong<br>";
      $err = "f";
      }else{
        $err = "t";
      }
  if(empty($password)){
      echo "Password masih kosong.<br>";
      $err = "f";
      }else{
        $err = "t";
      }


$data = mysqli_query($db, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($data);

  $_SESSION['username'] = $username;
  header("Location:newData.php");
}
?>