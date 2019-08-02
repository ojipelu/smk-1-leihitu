<?php
session_start();
require_once("koneksi.php");
$id_member = escape($_POST['id_member']);
$nama_member = escape($_POST['nama_member']);
$username = escape($_POST['username']);
$alamat = escape($_POST['alamat']);
$password = escape($_POST['password']);
//$nis = escape($_POST['nis']);
//	$jenis_kelamin = escape($_POST['jenis_kelamin']);
$kode_lama = escape($_POST['kode_lama']);
$a = mysql_query("update member set id_member='$id_member', nama_member='$nama_member', user_name='$username', password='$password', alamat='$alamat' where id_member='$kode_lama'");
if($a){
	$_SESSION['nm_mbr'] = $nama_member;
	setcookie("berhasil", "berhasil mengedit akun", time()+2);
}else{
	setcookie("gagal", "gagal mengedit akun, ".mysql_error(), time()+2);
}
header("location:index.php?h=akun");
?>