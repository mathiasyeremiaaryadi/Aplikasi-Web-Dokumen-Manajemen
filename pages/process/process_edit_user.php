<?php
	include("db.php");
			
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$email = $_POST['email'];
	$divisi = $_POST['divisi'];
	
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
		$sql = "UPDATE user 
				SET nama = '$nama', 
					email = '$email',  
					foto = '$path',
					divisi_id = '$divisi'
				WHERE id = $_POST[id]";
		mysqli_query($koneksi, $sql);
	} else {
		$sql = "UPDATE user 
				SET nama = '$nama', 
					email = '$email',
					divisi_id = '$divisi'
				WHERE id = $_POST[id]";
		mysqli_query($koneksi, $sql);
	}
	header('Location: ../../index.php?page=user');
?>