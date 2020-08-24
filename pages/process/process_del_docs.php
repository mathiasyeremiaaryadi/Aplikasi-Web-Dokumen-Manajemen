<?php
	session_start();
	include("db.php");
	$sql = "DELETE FROM docs WHERE id = $_GET[id]";
	mysqli_query($koneksi, $sql);
	header('Location: ../../index.php?page=docs');
?>