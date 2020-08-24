<?php
	session_start();
	include("db.php");
	
	$lama = mysqli_real_escape_string($koneksi, $_POST['lama']);
	
	$baru = mysqli_real_escape_string($koneksi, $_POST['baru']);
	
	$sql = "SELECT * FROM user WHERE id = $_POST[id]"; 
	$hasil = mysqli_query($koneksi, $sql);
	
	// if($row = mysqli_fetch_assoc($hasil)) {
	// 	$id = $row['id'];
	if(password_verify($lama, $row['password'])) {
		$baru = password_hash($baru, PASSWORD_BCRYPT);
		if($lama == $row['password']) {
			$sql2 = "UPDATE user SET password = '$baru'
					 			WHERE id = $_POST[id]";
			mysqli_query($koneksi, $sql2);
			header("Location: ../../index.php?in=edit&page=edit_user&id=$id&sukses=pass");
		} else { header("Location: ../../index.php?in=edit&page=edit_pass&id=$id&gagal=salah"); }
	} else { header("Location: ../../index.php?in=edit&page=edit_pass&id=$id&gagal=user"); }
?>