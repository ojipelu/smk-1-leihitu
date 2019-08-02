<?php
$host = 'localhost';
$usr = "root";
$pwd = '';
$db = "sekolahsmk";

// $con = mysqli_connect($host, $usr, $pwd) or die('gagal koneksi server');
// mysqli_select_db($con, $db) or die('database error');

// Create connection
$con = mysqli_connect($host, $usr, $pwd, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error($conn));
}


function escape($c){
	return mysqli_real_escape_string($c);
}
function toIdr($number){
	return number_format($number);	
}
function must_login(){
	if(!isset($_SESSION['mbr'])) {
		echo '<script>window.location="index.php?h=terlarang"</script>';
	}
}
?>