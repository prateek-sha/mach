<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('Location: ../website/index.php');
	exit();
}
else
{
	$sessionemail = $_SESSION['email'];
}

?>