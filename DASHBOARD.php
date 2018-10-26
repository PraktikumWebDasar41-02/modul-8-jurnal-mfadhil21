<?php  
	include('koneksi.php');
	$result=mysqli_query($db, "SELECT * FROM data");
	$row = mysqli_fetch_assoc($result);

	if (isset($_POST['cari'])) {
		session_start();
		$_SESSION['cr'] = $_POST['search'];
		header('Location: cari.php');	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="" method="post">
			<table border="1">
				<tr>
					<td>USERNAME</td>
					<td>NAMA DEPAN</td>
					<td>NAMA BELAKANG</td>
					<td>NIM </td>
					<td>KELAS</td>
					<td>HOBI </td>
					<td>GENRE</td>
					<td>WISATA</td>
					<td>TANGGAL</td>
					<td>AKSI</td>

				</tr>
				<?php  
					foreach ($+result as $key) {
						echo "<tr><td>". $key['n_depan']. "</td>";
						echo "<tr><td>". $key['n_belakang']. "</td>";
						echo "<td>". $key['nim']. "</td>";
						echo "<td>". $key['kelas']. "</td>";
						echo "<tr><td>". $key['hobi']. "</td>";
						echo "<tr><td>". $key['genre']. "</td>";
						echo "<tr><td>". $key['wisata']. "</td>";
						echo "<tr><td>". $key['tanggal']. "</td>";
						echo "<td><a href='del.php?nim=".$key['nim']."'>DELETE</a></td></tr>";
						echo "<td><a href='edit.php?nim2=".$key['nim']."'>EDIT</a></td><tr>";
					}
				?>
				
				
			</table>		
			<input type="text" name="search">
			<input type="submit" name="cari" value="cari">	
		</form>
</body>
</html>
