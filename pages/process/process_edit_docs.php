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
	
	$sql = "SELECT * FROM docs WHERE id = $_POST[id]"; 
	$hasil = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($hasil);
	$id = $row['id'];
	
	if($size <= 12000000 && in_array($ext, $ext_boleh)) {
		move_uploaded_file($sumber, $tujuan);
		$_SESSION['notif'] = "edit_dokumen";
		$sql2 = "UPDATE docs
						SET judul = '$judul',
								file = '$path',
								deskripsi = '$deskripsi',
								tanggal = '$tanggal',
								user_id = $_SESSION[user_id],
								kategori_id = '$kategori',
								divisi_id = $divisi
						WHERE id = $_POST[id]";
		mysqli_query($koneksi, $sql2);
		header("Location: ../../index.php?page=docs");
	} elseif(empty($file)) {
		$_SESSION['notif'] = "edit_dokumen";
		$sql2 = "UPDATE docs
						SET judul = '$judul',
								deskripsi = '$deskripsi',
								tanggal = '$tanggal',
								user_id = $_SESSION[user_id],
								kategori_id = '$kategori',
								divisi_id = $divisi
						WHERE id = $_POST[id]";
		mysqli_query($koneksi, $sql2);
		header("Location: ../../index.php?page=docs");
	} else {
		header("Location: ../../index.php?in=edit&page=edit_docs&id=$id&error=gagal");
	}
?>