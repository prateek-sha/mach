<?php
date_default_timezone_set("Asia/Kolkata");
include("configure_review.php");
include("configure_orders.php");
$kraya_review = new Review();
$kraya_order = new Orders();
$type = $_GET['type'];
$number_of_star = $_GET['star'];
$kraya_order->id = $_GET['id'];
$row = $kraya_order->getRecordById();
if ($row == false){
    header("location: index.php?error");
}
$kraya_review->manu_id = $row[0]['manu_id'];
$kraya_review->user_id = $row[0]['user_id'];
$kraya_review->product_para = $row[0]['product_para'];
$kraya_review->number_of_star = $number_of_star;
$kraya_review->type = $type;
$kraya_review->addeddate = date("Y-m-d H:i:s");


if ( $kraya_review->checkReview() ){
    header("location: orderdetails.php?id=".$_GET['id']);
}
else{
    $kraya_review->insert();
    echo "done";
    header("location: orderdetails.php?id=".$_GET['id']);

}
?>