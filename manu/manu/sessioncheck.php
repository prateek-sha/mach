<?php
session_start();
include("../admin/configure_manu.php");
$kraya_manu = new Manufacture();
if(!isset($_SESSION['email']))

{
	header('Location: ../website/login-manufacture.php');
	exit();
}
else
{
	$kraya_manu->email = $_SESSION['email'];
	$row = $kraya_manu->EmailCheck();
	$manuid = $row[0]['id'];
	$sessionemail = $_SESSION['email'];
}

?>