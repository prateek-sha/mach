<?php ob_start(); ?>
<?php
date_default_timezone_set("Asia/Kolkata");
include ('sessioncheck.php');
include ('configure_products.php');

if(!isset($_GET['id']) || !isset($_GET['status']))
{	
	exit();
}
else
{
	$inbox_object = new Products ();
	$inbox_object->id=$_GET['id'];
	$inbox_object->active_price=$_GET['status'];
	$inbox_object->addeddate = date("Y-m-d H:i:s");
	$result = $inbox_object->price_change_active_status();
	if($_GET['active_price']==1)
	{
		$_SESSION['msg'] = "products id: " . $_GET['id'] . " status changed to ON" ;
	}
	else
	{
		$_SESSION['msg'] = "products id: " . $_GET['id'] . " status changed to OFF" ;
	}
	header ('Location: products_list.php');
}
?>
<?php ob_flush(); ?>