<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_kalender = urldecode($_GET['id']);
	$a = mysqli_query($con,"delete from kalender_akademik where id_kalender='$id_kalender'");
	if($a){
		setcookie("berhasil", "berhasil menghapus kalender akademik", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus kalender akademik", time()+2);
	}
	header("location:index.php?h=kalender");
}else if($_POST['aksi']=='tambah'){
	$id_kalender = mysqli_real_escape_string($_POST['id_kalender']);
	$tgl_awals = explode("/", mysqli_real_escape_string($_POST['tgl_awal']));
	$tgl_awal = $tgl_awals[2].'-'.$tgl_awals[1].'-'.$tgl_awals[0];
	$tgl_akhirs = explode("/", mysqli_real_escape_string($_POST['tgl_akhir']));
	$tgl_akhir = $tgl_akhirs[2].'-'.$tgl_akhirs[1].'-'.$tgl_akhirs[0];
	$keterangan = mysqli_real_escape_string($_POST['keterangan']);
	$a = mysqli_query($con,"insert into kalender_akademik(id_kalender, tgl_awal, tgl_akhir, keterangan) values('$id_kalender', '$tgl_awal', '$tgl_akhir', '$keterangan')");
	if($a){
		setcookie("berhasil", "berhasil menambah kalender akademik", time()+2);
	}else{
		setcookie("gagal", "gagal menambah kalender akademik, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=kalender");
}else if($_POST['aksi']=='edit'){
	$kode_lama = mysqli_real_escape_string($con, $_POST['kode_lama']);
	$id_kalender = mysqli_real_escape_string($con, $_POST['id_kalender']);
	$tgl_awals = explode("/", mysqli_real_escape_string($con, $_POST['tgl_awal']));
	$tgl_awal = $tgl_awals[2].'-'.$tgl_awals[1].'-'.$tgl_awals[0];
	$tgl_akhirs = explode("/", mysqli_real_escape_string($con, $_POST['tgl_akhir']));
	$tgl_akhir = $tgl_akhirs[2].'-'.$tgl_akhirs[1].'-'.$tgl_akhirs[0];
	$keterangan = mysqli_real_escape_string($con, $_POST['keterangan']);
	$a = mysqli_query($con,"update kalender_akademik set id_kalender='$id_kalender', tgl_awal='$tgl_awal', tgl_akhir='$tgl_akhir', keterangan='$keterangan' where id_kalender='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil mengedit kalender akademik", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit kalender akademik, ".mysql_error(), time()+2);
	}
	header("location:index.php?h=kalender");
}
?>