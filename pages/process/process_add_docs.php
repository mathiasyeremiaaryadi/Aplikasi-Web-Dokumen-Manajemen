<?php
	session_start();
	
	date_default_timezone_set('Asia/Jakarta');
	include("db.php");
	
	$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
	$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
	$tanggal = date('Y-m-d H:i:s');
	$kategori = $_POST['kategori'];
	$divisi = $_POST['divisi'];

	$file = $_FILES['file']['name'];
	$size = $_FILES['file']['size'];

	$ext = explode(".", $file);
	$ext = end($ext);
	$ext = strtolower($ext);
	$ext_boleh = array("docx", "doc", "pdf", "rtf", "dotm", "txt", "dotx", "pptx");
	$sumber = $_FILES['file']['tmp_name'];
	$tujuan = "../../file_docs/" . $judul . "." . $ext;
	$path = "file_docs/" . $judul . "." . $ext;
	
	if($size <= 12000000 && in_array($ext, $ext_boleh)) {
		move_uploaded_file($sumber, $tujuan);
		$_SESSION['notif'] = "add_dokumen";
		$sql = "INSERT INTO docs (judul, file, deskripsi, tanggal, user_id, kategori_id, divisi_id)
				VALUES ('$judul', '$path', '$deskripsi', '$tanggal', $_SESSION[user_id], '$kategori', $divisi)";
		mysqli_query($koneksi, $sql);
		header('Location: ../../index.php?page=docs');
	} else {
		header('Location: ../../index.php?in=add&page=add_docs&error=gagal');
	}
?>