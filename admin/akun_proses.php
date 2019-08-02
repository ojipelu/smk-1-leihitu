<?php
session_start();
require_once("../koneksi.php");
$kode_lama = mysqli_real_escape_string($con, $_POST['kode_lama']);
$id_admin = mysqli_real_escape_string($con, $_POST['id_admin']);
$nama_admin = mysqli_real_escape_string($con, $_POST['nama_admin']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$a = mysql_query("update admin set id_admin='$id_admin', nama_admin='$nama_admin', user_name='$username', password='$password' where id_admin='$kode_lama'");
if($a){
	$_SESSION['nm_adm'] = $nama_admin;
	setcookie("berhasil", "berhasil megedit akun", time()+2);
}else{
	setcookie("gagal", "gagal mengedit akun, ".mysql_error(), time()+2);
}
header("location:index.php?h=akun");
?>