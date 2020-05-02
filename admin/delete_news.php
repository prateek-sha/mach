<?php
date_default_timezone_set("Asia/Kolkata");
include 'sessioncheck.php';
include ('configure_news.php');

$id=$_GET['id'];

//Creating Object of Userrole Class
$karya_object = new News();

//Adding Data into Object
$karya_object->addeddate = date("Y-m-d H:i:s");
$karya_object->id=$_GET['id'];
		
$karya_object->deleteRecord();
$_SESSION['msg'] = "1 News record Deleted";

//calling connection close function
$karya_object->closeconnection();	

header("Location: news_list.php");
exit();

?>