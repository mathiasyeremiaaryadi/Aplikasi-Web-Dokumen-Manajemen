<?php
	session_start();
	include("db.php");
	$sql = "DELETE FROM divisi WHERE id = $_GET[id]";
	mysqli_query($koneksi, $sql);
	header('Location: ../../index.php?page=div');
?>