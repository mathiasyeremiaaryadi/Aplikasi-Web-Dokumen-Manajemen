<?php
	session_start();
	include("db.php");
	
	$kategori = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$cat = $_POST['cat'];
	
	$sql = "INSERT INTO kategori (nama, user_id, divisi_id)
			VALUES ('$kategori', $_SESSION[user_id], $cat)";
	mysqli_query($koneksi, $sql);
	
	header('Location: ../../index.php?page=kat');
?>