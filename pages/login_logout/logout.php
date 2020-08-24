<?php
	session_start();
	include("../process/db.php");
	$loggedtime = time() - 300; // 5 minutes
	$sql = "UPDATE user SET log = $loggedtime WHERE id = $_SESSION[user_id]";
	mysqli_query($koneksi, $sql);
	
	$_SESSION['user_id'] = null;
	$_SESSION['divisi_id'] = null;
	$_SESSION['leader'] = null;
	$_SESSION['admin'] = null;
	
	header('Location: login.php');
?>