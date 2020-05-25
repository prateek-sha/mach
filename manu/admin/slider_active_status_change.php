<?php ob_start(); ?>
<?php
date_default_timezone_set("Asia/Kolkata");
include ('sessioncheck.php');
include ('configure_manu.php');

if(!isset($_GET['id']) || !isset($_GET['emailverified']))
{	
	exit();
}
else
{
	$inbox_object = new Manufacture();
	$inbox_object->id=$_GET['id'];
	$inbox_object->emailverified=$_GET['emailverified'];
	$result = $inbox_object->change_active_status();
	if($_GET['emailverified']==1)
	{
		$_SESSION['msg'] = "Manufacture id: " . $_GET[id] . " status changed to ON" ;
	}
	else
	{
		$_SESSION['msg'] = "Manufacture id: " . $_GET[id] . " status changed to OFF" ;
	}
	header ('Location: manufacture_list.php');
}
?>
<?php ob_flush(); ?>