<?php
	session_start();
	include("db.php");
	
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$user = $_POST['user'];
	
	$sql = "UPDATE divisi
					SET nama = '$nama',
							user_id = '$user'
					WHERE id = $_POST[id]";
	mysqli_query($koneksi, $sql);
	
	header('Location: ../../index.php?page=div');
?>