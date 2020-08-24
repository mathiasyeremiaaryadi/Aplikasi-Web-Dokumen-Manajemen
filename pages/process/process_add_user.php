<?php
	session_start();
	include("db.php");
	
	date_default_timezone_set('Asia/Jakarta');
	
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$email = $_POST['email'];
	$tanggal = date('Y-m-d');
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);
	$password = password_hash($password, PASSWORD_BCRYPT);
	$divisi = $_POST['divisi'];
	
	$foto = $_FILES['foto']['name'];
	$size = $_FILES['foto']['size'];

	$ext = explode(".", $foto);
	$ext = end($ext);
	$ext = strtolower($ext);
	$ext_boleh = array("jpg", "png", "gif", "jpeg");
	$sumber = $_FILES['foto']['tmp_name'];
	$tujuan = "../../image/uploads/" . $nama . "." . $ext;

	if(empty($foto)) {
		$path = "image/uploads/a.png";
		$sql = "INSERT INTO user (nama, email, password, foto, divisi_id, member)
						VALUES ('$nama', '$email', '$password', '$path', '$divisi', '$tanggal')";
		mysqli_query($koneksi, $sql);
	} else {
		$path = "image/uploads/" . $nama . "." . $ext;
		if($size <= 2000000 && in_array($ext, $ext_boleh)) {
			move_uploaded_file($sumber, $tujuan);
			$sql = "INSERT INTO user (nama, email, password, foto, divisi_id, member)
							VALUES ('$nama', '$email', '$password', '$path', '$divisi', '$tanggal')";
			mysqli_query($koneksi, $sql);
		}
	}
	header('Location: ../../index.php?page=user');
?>