<?php 
session_start();
unset($_SESSION['email_address']);
unset($_SESSION['suppid']);
header("Location: ../../public/supplierlogin.php");
?>