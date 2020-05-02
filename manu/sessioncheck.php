<?php
session_start();
$sitetitle="E-Commerce";
if(!isset($_SESSION['username']))
{
	header('Location: index.php');
	exit();
}
else
{
	$username = $_SESSION['username'];
}

?>