<?php ob_start(); ?>
<?php
date_default_timezone_set("Asia/Kolkata");
include ('sessioncheck.php');
include ('configure_finalproduct.php');

if(!isset($_GET['id']) || !isset($_GET['status']))
{	
	exit();
}
else
{
	$inbox_object = new FinalProducts ();
	$inbox_object->id=$_GET['id'];
	$inbox_object->active_status=$_GET['status'];
	$inbox_object->addeddate = date("Y-m-d H:i:s");
	$result = $inbox_object->change_active_status();
	if($_GET['active_status']==1)
	{
		$_SESSION['msg'] = "products id: " . $_GET['id'] . " status changed to ON" ;
	}
	else
	{
		$_SESSION['msg'] = "products id: " . $_GET['id'] . " status changed to OFF" ;
	}
	header ('Location: finalproduct_list.php');
}
?>
<?php ob_flush(); ?>