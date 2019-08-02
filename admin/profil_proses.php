<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_profil = urldecode($_GET['id']);
	$a = mysqli_query($con, "delete from profil_sekolah where id_profil='$id_profil'");
	if($a){
		setcookie("berhasil", "berhasil menghapus profil sekolah", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus profil sekolah", time()+2);
	}
	header("location:index.php?h=profil");
}else if($_POST['aksi']=='tambah'){
	$id_profil = mysqli_real_escape_string($con, $_POST['id_profil']);
	$judul_profil = mysqli_real_escape_string($con, $_POST['judul_profil']);
	$isi = $_POST['isi'];
	$a = mysqli_query($con,"insert into profil_sekolah(id_profil, judul_profil, isi_profil) values('$id_profil', '$judul_profil', '$isi')");
	if($a){
		setcookie("berhasil", "berhasil menambah profil sekolah", time()+2);
	}else{
		setcookie("gagal", "gagal menambah profil sekolah", time()+2);
	}
	header("location:index.php?h=profil");
}else if($_POST['aksi']=='edit'){
	$kode_lama = mysqli_real_escape_string($con, $_POST['kode_lama']);
	$id_profil = mysqli_real_escape_string($con, $_POST['id_profil']);
	$judul_profil = mysqli_real_escape_string($con, $_POST['judul_profil']);
	$isi = $_POST['isi'];
	$a = mysqli_query($con, "update profil_sekolah set id_profil='$id_profil', judul_profil='$judul_profil', isi_profil='$isi' where id_profil='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil mengedit profil sekolah", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit profil sekolah, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=profil");
}
?>