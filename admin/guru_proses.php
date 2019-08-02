<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_guru = urldecode($_GET['id']);
	$a = mysqli_query($con, "delete from guru where id_guru='$id_guru'");
	if($a){
		setcookie("berhasil", "berhasil menghapus guru", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus guru", time()+2);
	}
	header("location:index.php?h=guru");
}else if($_POST['aksi']=='tambah'){
	$id_guru = mysqli_real_escape_string($con, $_POST['id_guru']);
	$nama_guru = mysqli_real_escape_string($con, $_POST['nama_guru']);
	$nip = mysqli_real_escape_string($con, $_POST['nik']);
	$alamat = mysqli_real_escape_string($con, $_POST['alamat']);
	$bidang_studi = mysqli_real_escape_string($con, $_POST['bidang_studi']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$riwayat_pendidikan = mysqli_real_escape_string($con, $_POST['riwayat_pendidikan']);
	$a = mysqli_query($con, "insert into guru(id_guru, nama_guru, nip,  alamat, bidang_studi, email, riwayat_pendidikan) values('$id_guru', '$nama_guru', '$nip', '$alamat', 
		'$bidang_studi', '$email', '$riwayat_pendidikan')");
	if($a){
		setcookie("berhasil", "berhasil menambah guru", time()+2);
	}else{
		setcookie("gagal", "gagal menambah guru, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=guru");
}else if($_POST['aksi']=='edit'){
	$kode_lama = mysqli_real_escape_string($con, $_POST['kode_lama']);
	$id_guru = mysqli_real_escape_string($con, $_POST['id_guru']);
	$nama_guru = mysqli_real_escape_string($con, $_POST['nama_guru']);
	$nip = mysqli_real_escape_string($con, $_POST['nik']);
	$alamat = mysqli_real_escape_string($con, $_POST['alamat']);
	$bidang_studi = mysqli_real_escape_string($con,$_POST['bidang_studi']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$riwayat_pendidikan = mysqli_real_escape_string($con, $_POST['riwayat_pendidikan']);
	$a = mysqli_query($con,"update guru set id_guru='$id_guru', nama_guru='$nama_guru', nip='$nip', tempat='$tempat_lahir', tgl_lahir='$tgl_lahir',agama='$agama', alamat='$alamat', bidang_studi='$bidang_studi', email='$email', riwayat_pendidikan='$riwayat_pendidikan' where id_guru='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil mengedit guru", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit guru, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=guru");
}
?>