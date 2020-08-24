<?php
	session_start();
	include("db.php");
	
	$sql = "DELETE FROM kategori WHERE id = $_GET[id]";

	mysqli_query($koneksi, $sql);
	
	header('Location: ../../index.php?page=kat');
?>