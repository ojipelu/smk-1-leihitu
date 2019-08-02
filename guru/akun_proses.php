<?php
session_start();
require_once("../koneksi.php");
$kode_lama = escape($_POST['kode_lama']);
//$id_guru = escape($_POST['id_guru']);
$nama_guru = escape($_POST['nama_guru']);
//$nip = escape($_POST['nik']);
$tempat_lahir = escape($_POST['tempat_lahir']);
$tgl_lahirs = explode("/", escape($_POST['tgl_lahir']));
$tgl_lahir = $tgl_lahirs[2].'-'.$tgl_lahirs[1].'-'.$tgl_lahirs[0];
$alamat = escape($_POST['alamat']);
$bidang_studi = escape($_POST['bidang_studi']);
//$status = escape($_POST['status']);
//$golongan = escape($_POST['golongan']);
$prestasi = escape($_POST['prestasi']);
$riwayat_pendidikan = escape($_POST['riwayat_pendidikan']);
$a = mysql_query("update guru set nama_guru='$nama_guru', tempat='$tempat_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat', bidang_studi='$bidang_studi', prestasi='$prestasi', riwayat_pendidikan='$riwayat_pendidikan' where id_guru='$kode_lama'");
if($a){
	$_SESSION['nm_gru'] = $nama_guru;
	setcookie("berhasil", "berhasil mengedit akun", time()+2);
}else{
	setcookie("gagal", "gagal mengedit akun, ".mysql_error(), time()+2);
}
header("location:index.php?h=akun");

?>