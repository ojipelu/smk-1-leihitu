<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_member = urldecode($_GET['id']);
	$a = mysqli_query($con, "delete from member where id_member='$id_member'");
	if($a){
		setcookie("berhasil", "berhasil menghapus member / siswa", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus member / siswa", time()+2);
	}
	header("location:index.php?h=member");
}else if($_POST['aksi']=='tambah'){
	$id_member = mysqli_real_escape_string($con, $_POST['id_member']);
	$nama_member = mysqli_real_escape_string($con, $_POST['nama_member']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$nis = mysqli_real_escape_string($con, $_POST['nis']);
	$agama = mysqli_real_escape_string($con, $_POST['agama']);
	$jenis_kelamin = mysqli_real_escape_string($con, $_POST['jenis_kelamin']);
	$alamat = mysqli_real_escape_string($con, $_POST['alamat']);
	$a = mysqli_query($con, "insert into member(id_member, nama_member, user_name, password, nis, agama, jenis_kelamin, alamat) values('$id_member', '$nama_member', '$username', '$password', '$nis','$agama', '$jenis_kelamin', '$alamat')");
	if($a){
		setcookie("berhasil", "berhasil menambah member / siswa", time()+2);
	}else{
		setcookie("gagal", "gagal menambah member / siswa", time()+2);
	}
	header("location:index.php?h=member");
}else if($_POST['aksi']=='edit'){
	$kode_lama = mysqli_real_escape_string($con, $_POST['kode_lama']);
	$id_member = mysqli_real_escape_string($con, $_POST['id_member']);
	$nama_member = mysqli_real_escape_string($con, $_POST['nama_member']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$nis = mysqli_real_escape_string($con, $_POST['nis']);
	$agama = mysqli_real_escape_string($con, $_POST['agama']);
	$jenis_kelamin = mysqli_real_escape_string($con, $_POST['jenis_kelamin']);
	$alamat = mysqli_real_escape_string($con, $_POST['alamat']);
	$a = mysqli_query($con, $con, "update member set id_member='$id_member', nama_member='$nama_member', user_name='$username', password='$password', nis='$nis', agama='$agama', jenis_kelamin='$jenis_kelamin', alamat='$alamat' where id_member='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil mengedit member / siswa", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit member / siswa, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=member");
}
?>