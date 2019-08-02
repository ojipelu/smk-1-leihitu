<?php
// var_dump($_POST['username']);
require_once("koneksi.php");
$username = mysqli_real_escape_string($con, $_POST['username']);
$pwd = mysqli_real_escape_string($con, $_POST['password']);
$a = mysqli_query($con, "select * from member where user_name='$username' and password='$pwd'");
$cek = mysqli_num_rows($a);
if($cek < 1){
	?>
	
	<script>
		alert("login gagal");
		window.location = 'index.php';
	</script>

	<?php
}else{
	$b = mysqli_fetch_array($a);
	session_start();
	$_SESSION['mbr'] = $b['id_member'];
	$_SESSION['nm_mbr'] = $b['nama_member'];
	header("location:index.php");
}
?>
