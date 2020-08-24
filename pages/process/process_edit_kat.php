<?php
	session_start();
	include("db.php");
	
	$kategori = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$cat = $_POST['cat'];

	$sql = "UPDATE kategori
					SET nama = '$kategori',
							divisi_id = $cat
					WHERE id = $_POST[id]";
	mysqli_query($koneksi, $sql);

	header('Location: ../../index.php?page=kat');
?>