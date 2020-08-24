<?php
	session_start();
	include("db.php");
	
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$pass = password_hash($pass, PASSWORD_BCRYPT);

	if(empty($pass)) {
		$sql = "UPDATE user 
						SET nama = '$nama',
								email = '$email'
						WHERE id = $_SESSION[user_id]";
		mysqli_query($koneksi, $sql);
	} else {
		$sql = "UPDATE user 
						SET nama = '$nama',
								email = '$email',
								password = '$pass'
						WHERE id = $_SESSION[user_id]";
		mysqli_query($koneksi, $sql);
	}

	header('Location: ../../index.php?page=profile');
?>