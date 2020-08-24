<?php
	session_start();
	include("db.php");
	
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$user = $_POST['user'];
	
	$sql = "INSERT INTO divisi (nama, user_id)
					VALUES ('$nama', '$user')";
	mysqli_query($koneksi, $sql);

	header('Location: ../../index.php?page=div');
?>