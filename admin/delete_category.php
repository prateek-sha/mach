<?php
date_default_timezone_set("Asia/Kolkata");
include 'sessioncheck.php';
include ('configure_category.php');

$id=$_GET['id'];

//Creating Object of Userrole Class
$karya_object = new Category();

//Adding Data into Object
$karya_object->addeddate = date("Y-m-d H:i:s");
$karya_object->id=$_GET['id'];
		
$karya_object->deleteRecord();
$_SESSION['msg'] = "1 Category record Deleted";

//calling connection close function
$karya_object->closeconnection();	

header("Location: category_list.php");
exit();

?>