<?php
require_once("../koneksi.php");
$username = mysqli_real_escape_string($con, $_POST['username']);
$pwd = mysqli_real_escape_string($con, $_POST['password']);
$a = "select * from admin where user_name='".$username."' and password='".$pwd."'";
$sql = mysqli_query($con, $a);

if(mysqli_num_rows($sql) >= 1){
	$cek = mysqli_fetch_array($sql);
	session_start();
	$_SESSION['adm'] = $cek['id_admin'];
	$_SESSION['nm_adm'] = $cek['nama_admin'];
	header("location:index.php");
}else{
	?>
	<script>
		alert("Login Admin Gagal");
		window.location = 'login.php';
	</script>
	<?php
}
?>