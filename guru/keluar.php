<?php
session_start();
unset($_SESSION['gru']);
unset($_SESSION['nm_gru']);
header("location:login.php");
?>