<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
			<table border="1">
				<tr>
					<td>NAMA DEPAN :</td>
					<td><input type="text" name="n_depan"></td>
				</tr>
				<tr>
					<td>NAMA BELAKANG :</td>
					<td><input type="text" name="n_belakang"></td>
				</tr>
				<tr>
					<td>NIM :</td>
					<td><input type="text" name="nim"></td>
				</tr>
				<tr>
					<td>KELAS :</td>
					<td>
						<select name="kelas">
							<option value="null">Pilih..</option>
							<option>41-01</option>
							<option>41-02</option>
							<option>41-03</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>HOBI :</td>
					<td><input type="checkbox" name="hobi[]" value="tidur">TIDUR</td>
					<td><input type="checkbox" name="hobi[]" value="basket">BASKET</td>
					<td><input type="checkbox" name="hobi[]" value="dota">DOTA</td>
				</tr>
				<tr>
					<td>GENRE FILM :</td>
					<td><input type="checkbox" name="genre[]" value="anime">ANIME</td>
					<td><input type="checkbox" name="genre[]" value="action">ACTION</td>
					<td><input type="checkbox" name="genre[]" value="drama">DRAMA</td>
				</tr>
				<tr>
					<td>TEMPAT WISATA :</td>
					<td><input type="checkbox" name="wisata[]" value="bali">BALI</td>
					<td><input type="checkbox" name="wisata[]" value="tanjung selor">TANJUNG SELOR</td>
					<td><input type="checkbox" name="wisata[]" value="jakata">JAKARTA</td>
					<td><input type="checkbox" name="wisata[]" value="lombok">LOMBOK</td>
				</tr>
				<tr>
					<td>TANGGAL LAHIR :</td>
					<td><input type="date" name="tgl"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="SUBMIT"></td>
				</tr>
			</table>
	</form>
</body>
</html>

<?php  
	include('koneksi.php');
	if (isset($_POST['submit'])) {
		$depan = $_POST['n_depan'];
		$belakang = $_POST['n_belakang'];
		$nim = $_POST['nim'];
		$kelas = $_POST['kelas'];
		$hobi = $_POST['hobi'];
		$genre = $_POST['genre'];
		$wisata = $_POST['wisata'];
		$tgl = $_POST['tgl'];

		if (strlen($n_depan)>=25) {
		echo "<br>";
		$err = "f";
		echo "Nama Maksimal 35 Karakter";
		}else{
		$err = "t";
			}
		if (strlen($n_belakang)>=25) {
		echo "<br>";
		$err = "f";
		echo "Nama Maksimal 35 Karakter";
		}else{
		$err = "t";
			}	
		if(empty($n_depan)){
		echo "Nama masih kosong.<br>";
		$err = "f";
		}else{
			$err = "t";
		}
		if(empty($n_belakang)){
		echo "Nama masih kosong.<br>";
		$err = "f";
		}else{
			$err = "t";
		}

		if (strlen($nim)==10) {
			echo "<br>";
			$nim_err = "t";
		}else{
			$nim_err = "f";
			echo "NIM Maksimal Minimal 10 Karakter";
		}

		if (!is_numeric($nim)) {
			echo "<br>";
			$nim_err = "f";
			echo "NIM Harus Angka";
		}else{
			$nim_err = "t";
		}

		if (isset($hobi)) {
		$tampung = "";
		for ($i=0; $i < count($hobi) ; $i++) { 
			$tampung .= "$hobi[$i] ";
			}
		}
		if(empty($tampung)){
			echo "Nama masih kosong.<br>";
			$err = "f";
			}else{
				$err = "t";
			}
		if ($kelas == 'null') {
			echo "<br>";
			$err = "f";
			echo "Isilah Fakultas";
		}else{
			$err = "t";
		}
		echo "$tampung";
		if ($err == "t" && $nim_err == "t") {
			session_start();
			$user = $_SESSION['username'];

		$sql = "UPDATE user SET n_depan='$n_depan',n_belakang='n_belakang', nim='$nim',kelas='$kelas',hobi='$tampung',genre='$tampung',wisata='$tampung',tgl='$tgl' WHERE username='$user'";

		if ($db->query($sql) === TRUE) {
			echo "<br>";
		    echo "New record created successfully";
		    header("Location: dashboard.php");
		} else {
			echo "<br>";
		    echo "Error: ".$sql."<br>" . $db->error;
		}
		}else{
		  echo "<script>
		alert('Login Gagal');
		  </script>";
			echo "<br>";
			echo "GAGAL";
		}
		$db->close();
		}

?>
