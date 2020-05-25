<?php
include('../admin/configure_user.php');
$krya_user = new User();
session_start();
if(!isset($_SESSION['email']) )
{
	header('Location: user-login.php');
	exit();
}
else
{
	$email = $_SESSION['email']; 
	$krya_user->email = $email;
	$row = $krya_user->EmailCheck();
	$userid =$row[0]['id'];
}

?>