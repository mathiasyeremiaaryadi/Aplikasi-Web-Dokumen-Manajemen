<?php
	session_start();
	include("db.php");
	$sql = "SELECT * FROM user WHERE id = $_POST[id]";
	$hasil = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($hasil);

	$nama = $row['nama'];
	$foto = $_FILES['foto']['name'];
	$size = $_FILES['foto']['size'];

	$ext = explode(".", $foto);
	$ext = end($ext);
	$ext = strtolower($ext);
	$ext_boleh = array("jpg", "png", "gif", "jpeg");
	$sumber = $_FILES['foto']['tmp_name'];
	$tujuan = "../../image/uploads/" . $nama . "." . $ext;
	$path = "image/uploads/" . $nama . "." . $ext;
	
	if($size <= 2000000 && in_array($ext, $ext_boleh)) {
		move_uploaded_file($sumber, $tujuan);
		$sql2 = "UPDATE user SET foto = '$path'
				 		 WHERE id = $_POST[id]";
		mysqli_query($koneksi, $sql2);
		header('Location: ../../index.php?page=profile');
	} else {
		header('Location: ../../index.php?page=profile&error=gagal');
	}
?>