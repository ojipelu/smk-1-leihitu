<?php
session_start();
unset($_SESSION['mbr']);
unset($_SESSION['nm_mbr']);
header("location:index.php");
?>