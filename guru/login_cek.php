<?php
require_once("../koneksi.php");
$nip = mysqli_real_escape_string($con, $_POST['nip']);
$pwd = mysqli_real_escape_string($con, $_POST['password']);
$a = mysqli_query($con, "select * from guru where nip='".$nip."' and password='".$pwd."'");

$cek = mysqli_num_rows($a);
// var_dump($cek);
// die();
if($cek < 1){
	?>
	<script>
		alert("Login Guru Gagal");
		window.location = 'login.php';
	</script>
	<?php
}else{
	$b = mysqli_fetch_array($a);
	session_start();
	$_SESSION['gru'] = $b['id_guru'];
	$_SESSION['nm_gru'] = $b['nama_guru'];
	header("location:index.php");
}
?>