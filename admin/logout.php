<?php 
session_start();
$_SESSION['session_username'] = "";
$_SESSION['session_password'] = "";
session_destroy();
$_SESSION['logged_in']=false;
header("location:login.php");

?>