<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_admin = urldecode($_GET['id']);
	$a = mysqli_query($con, "delete from admin where id_admin='$id_admin'");
	if($a){
		setcookie("berhasil", "berhasil menghapus admin", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus admin", time()+2);
	}
	header("location:index.php?h=admin");
}else if($_POST['aksi']=='tambah'){
	$id_admin = mysqli_real_escape_string($con, $_POST['id_admin']);
	$nama_admin = mysqli_real_escape_string($con, $_POST['nama_admin']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$a = mysqli_query($con,"insert into admin(id_admin, nama_admin, user_name, password) values('$id_admin', '$nama_admin', '$username', '$password')");
	if($a){
		setcookie("berhasil", "berhasil menambah admin", time()+2);
	}else{
		setcookie("gagal", "gagal menambah admin", time()+2);
	}
	header("location:index.php?h=admin");
}else if($_POST['aksi']=='edit'){
	$kode_lama = mysqli_real_escape_string($con, $_POST['kode_lama']);
	$id_admin = mysqli_real_escape_string($con,$_POST['id_admin']);
	$nama_admin = mysqli_real_escape_string($con,$_POST['nama_admin']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$a = mysqli_query("update admin set id_admin='$id_admin', nama_admin='$nama_admin', user_name='$username', password='$password' where id_admin='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil megedit admin", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit admin, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=admin");
}
?>