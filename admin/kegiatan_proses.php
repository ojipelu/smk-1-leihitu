<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_kegiatan = urldecode($_GET['id']);
	$a = mysqli_query($con, "delete from kegiatan where id_kegiatan='$id_kegiatan'");
	if($a){
		setcookie("berhasil", "berhasil menghapus kegiatan", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus kegiatan", time()+2);
	}
	header("location:index.php?h=kegiatan");
}else if($_POST['aksi']=='tambah'){
	$id_kegiatan = mysqli_real_escape_string($con, $_POST['id_kegiatan']);
	$nama_kegiatan = mysqli_real_escape_string($con, $_POST['nama_kegiatan']);
	$id_pemosting = $_SESSION['adm'];
	$isi = $_POST['isi'];
	$jenis = mysqli_real_escape_string($con, $_POST['jenis']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../kegiatan/$gambar";
	if(strlen($source)!=0){
		$a = mysqli_query($con, "insert into kegiatan(id_kegiatan, nama_kegiatan, tgl_posting, id_pemosting, isi, jenis, gambar) values('$id_kegiatan', '$nama_kegiatan', now(), '$id_pemosting', '$isi', '$jenis', '$gambar')");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = mysqli_query($con, "insert into kegiatan(id_kegiatan, nama_kegiatan, tgl_posting, id_pemosting, isi, jenis) values('$id_kegiatan', '$nama_kegiatan', now(), '$id_pemosting', '$isi', '$jenis')");
	}
	if($a){
		setcookie("berhasil", "berhasil menambah kegiatan", time()+2);
	}else{
		setcookie("gagal", "gagal menambah kegiatan", time()+2);
	}
	header("location:index.php?h=kegiatan");
}else if($_POST['aksi']=='edit'){
	$kode_lama = mysqli_real_escape_string($con, $_POST['kode_lama']);
	$id_kegiatan = mysqli_real_escape_string($con, $_POST['id_kegiatan']);
	$nama_kegiatan = mysqli_real_escape_string($con,$_POST['nama_kegiatan']);
	$id_pemosting = $_SESSION['adm'];
	$isi = $_POST['isi'];
	$jenis = mysqli_real_escape_string($con,$_POST['jenis']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../kegiatan/$gambar";
	$a = mysqli_query($con, "update kegiatan set id_kegiatan='$id_kegiatan', nama_kegiatan='$nama_kegiatan', id_pemosting='$id_pemosting', isi='$isi', jenis='$jenis' where id_kegiatan='$kode_lama'");
	if(strlen($source)!=0){
		$a = mysqli_query($con, "update kegiatan set gambar='$gambar' where id_kegiatan='$kode_lama'");
		if($a){
			@copy($source, $dest);
		}
	}
	if($a){
		setcookie("berhasil", "berhasil mengedit kegiatan", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit kegiatan", time()+2);
	}
	header("location:index.php?h=kegiatan");
}
?>