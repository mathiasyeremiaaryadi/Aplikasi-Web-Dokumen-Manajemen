<?php
	//db Credential CONSTANTS
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "app_dokumen");
	
	//Buat koneksi DB
	$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//Periksa jika ada kesalahan koneksi DB
	if(mysqli_connect_errno()){
		echo "Error :";
		echo mysqli_connect_error();
		echo "<br />Error code: ";
		echo mysqli_connect_errno();
		die();
	}
?>