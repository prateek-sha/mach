<?php ob_start(); ?>
<?php
date_default_timezone_set("Asia/Kolkata");
include ('sessioncheck.php');
include ('configure_order.php');

if(!isset($_GET['id']) || !isset($_GET['status']))
{	
	exit();
}
else
{
	$inbox_object = new Order ();
	$inbox_object->id=$_GET['id'];
	$inbox_object->dispacted=$_GET['status'];
	$inbox_object->addeddate = date("Y-m-d H:i:s");
	$result = $inbox_object->change_dispacted_status();
	if($_GET['status']==1)
	{
		$_SESSION['msg'] = "order  id: " . $_GET[id] . " status changed to dispacsed" ;
	}
	else
	{
		$_SESSION['msg'] = "category id: " . $_GET[id] . " status changed to OFF" ;
	}
	header ('Location: order_list.php');
}
?>
<?php ob_flush(); ?>