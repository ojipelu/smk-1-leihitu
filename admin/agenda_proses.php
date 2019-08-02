<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_agenda = urldecode($_GET['id']);
	$a = mysqli_query($con, "delete from agenda where id_agenda='$id_agenda'");
	if($a){
		setcookie("berhasil", "berhasil menghapus agenda", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus agenda", time()+2);
	}
	header("location:index.php?h=agenda");
}else if($_POST['aksi']=='tambah'){
	$id_agenda = mysqli_real_escape_string($con, $_POST['id_agenda']);
	$nama_agenda = mysqli_real_escape_string($con, $_POST['nama_agenda']);
	$tgl_agendas = explode("/", mysqli_real_escape_string($con, $_POST['tgl_agenda']));
	$tgl_agenda = $tgl_agendas[2].'-'.$tgl_agendas[1].'-'.$tgl_agendas[0];
	$isi = mysqli_real_escape_string($con, $_POST['isi']);
	$id_pemosting = $_SESSION['adm'];
	$a = mysqli_query($con, "insert into agenda(id_agenda, nama_agenda, tgl_agenda, isi, id_pemosting) values('$id_agenda', '$nama_agenda', '$tgl_agenda', '$isi', '$id_pemosting')");
	if($a){
		setcookie("berhasil", "berhasil menambah agenda", time()+2);
	}else{
		setcookie("gagal", "gagal menambah agenda, ".mysql_error(), time()+2);
	}
	header("location:index.php?h=agenda");
}else if($_POST['aksi']=='edit'){
	$kode_lama = mysqli_real_escape_string($con, $_POST['kode_lama']);
	$id_agenda = mysqli_real_escape_string($con, $_POST['id_agenda']);
	$nama_agenda = mysqli_real_escape_string($con, $_POST['nama_agenda']);
	$tgl_agendas = explode("/", mysqli_real_escape_string($con, $_POST['tgl_agenda']));
	$tgl_agenda = $tgl_agendas[2].'-'.$tgl_agendas[1].'-'.$tgl_agendas[0];
	$isi = mysqli_real_escape_string($con, $_POST['isi']);
	$id_pemosting = $_SESSION['adm'];
	$a = mysqli_query($con,"update agenda set id_agenda='$id_agenda', nama_agenda='$nama_agenda', tgl_agenda='$tgl_agenda', isi='$isi', id_pemosting='$id_pemosting' where id_agenda='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil mengedit agenda", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit agenda, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=agenda");
}
?>