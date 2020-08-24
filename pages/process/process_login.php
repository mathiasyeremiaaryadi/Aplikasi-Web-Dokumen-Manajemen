<?php 
	session_start();
	
	include("db.php");
	
	$email = mysqli_real_escape_string($koneksi, $_POST['email']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);
		
	$sql = "SELECT * FROM user
		   		WHERE email = '$email'"; 
	$hasil = mysqli_query($koneksi, $sql);
	
	if($row = mysqli_fetch_assoc($hasil)) {
		// if($password == $row['password']) {
		if(password_verify($password, $row['password'])) {
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['divisi_id'] = $row['divisi_id'];
			$_SESSION['notif'] = null;
			$sql2 = "SELECT * FROM divisi WHERE user_id = $row[id]";
			$hasil2 = mysqli_query($koneksi, $sql2);
			if($row['id'] == 1) {
				$_SESSION['admin'] = 1;
			} elseif(mysqli_num_rows($hasil2)) {
				$_SESSION['leader'] = 1;
			} else {
				$_SESSION['leader'] = 0;
			}
			header('Location: ../../index.php');
		} else {
			header('Location: ../login_logout/login.php?error=Password_salah');
		}
	} else {
		header('Location: ../login_logout/login.php?error=Username_tidak_terdaftar');
	}
?>