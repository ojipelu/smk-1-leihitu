<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_akademik = urldecode($_GET['id']);
	$a = mysqli_query($con, "delete from akademik where id_akademik='$id_akademik'");
	if($a){
		setcookie("berhasil", "berhasil menghapus akademik", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus akademik", time()+2);
	}
	header("location:index.php?h=akademik");
}else if($_POST['aksi']=='tambah'){
	$id_akademik = mysqli_real_escape_string($con, $_POST['id_akademik']);
	$nama_akademik = mysqli_real_escape_string($con, $_POST['nama_akademik']);
	$kategori = mysqli_real_escape_string($con, $_POST['kategori']);
	$isi = mysqli_real_escape_string($con,$_POST['keterangan']);
	$id_guru = mysqli_real_escape_string($con, $_POST['guru']);
	$file_materi = str_replace(" ", "_", $_FILES['file_materi']['name']);
	$source = $_FILES['file_materi']['tmp_name'];
	$dest = "../akademik/$file_materi";
	if(strlen($file_materi)!=0){
		$a = mysqli_query($con, "insert into akademik(id_akademik, nama_akademik, kategori, isi, tgl_posting, id_guru, file_materi) values('$id_akademik', '$nama_akademik', '$kategori', '$isi', now(), '$id_guru', '$file_materi')");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = mysqli_query($con, "insert into akademik(id_akademik, nama_akademik, kategori, isi, tgl_posting, id_guru) values('$id_akademik', '$nama_akademik', '$kategori', '$isi', now(), '$id_guru')");
	}
	if($a){
		setcookie("berhasil", "berhasil menambah akademik", time()+2);
	}else{
		setcookie("gagal", "gagal menambah akademik", time()+2);
	}
	header("location:index.php?h=akademik");
}else if($_POST['aksi']=='edit'){
	$kode_lama = mysqli_real_escape_string($con, $_POST['kode_lama']);
	$id_akademik = mysqli_real_escape_string($con, $_POST['id_akademik']);
	$nama_akademik = mysqli_real_escape_string($con, $_POST['nama_akademik']);
	$kategori = mysqli_real_escape_string($con, $_POST['kategori']);
	$isi = mysqli_real_escape_string($con, $_POST['keterangan']);
	$id_guru = mysqli_real_escape_string($con, $_POST['guru']);
	$file_materi = str_replace(" ", "_", $_FILES['file_materi']['name']);
	$source = $_FILES['file_materi']['tmp_name'];
	$dest = "../akademik/$file_materi";
	$a = mysqli_query($con, "update akademik set id_akademik='$id_akademik', nama_akademik='$nama_akademik', kategori='$kategori', isi='$isi', id_guru='$id_guru' where id_akademik='$kode_lama'");
	if(strlen($file_materi)!=0){
		$a = mysqli_query($con, "update akademik set file_materi='$file_materi' where id_akademik='$kode_lama'");
		if($a){
			@copy($source, $dest);
		}
		echo $_FILES['file_materi']['error'];
	}
	if($a){
		setcookie("berhasil", "berhasil mengedit akademik", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit akademik", time()+2);
	}
	header("location:index.php?h=akademik");
}
?>