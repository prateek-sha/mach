<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");



// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

include("../configure_checkout.php");
include("../../manu/configure_myproduct.php");
$kraya_myproduct = new MyProducts();
$kraya_checkout = new Checkout();

$kraya_checkout->order_id=$_POST['ORDERID'];
$kraya_checkout->txn_amount=$_POST['TXNAMOUNT'];
$check = array();
$check = explode("T",$_POST['ORDERID']);

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {


	if ($_POST["STATUS"] == "TXN_SUCCESS") {
			$kraya_checkout->addorder();
			foreach($_SESSION["shopping_cart"] as $keys => $values){
					unset($_SESSION["shopping_cart"][$keys]);}
					unset($_SESSION['order']);
					unset($_SESSION['is_valid']);
					echo "<b>Transaction status is success</b>" . "<br/>";
					for($i = 0 ; $i < count($check) ; $i++ )  {
						$kraya_checkout->updatePayment($check[$i]);
					}
					for($i = 0 ; $i < count($check) ; $i++ )  {
						$row = $kraya_checkout->getRecordByOrderId($check[$i]);
						if ($row == FALSE){
							echo "error";
						}
						else{
						$kraya_myproduct->updateQuantity($row[0]['manu_id'], $row[0]['product_para'], $row[0]['productquantity']);
						}
					}
					header("location: ../payment-success.php");

					//Process your transaction here as success transaction.
					//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
		header('location:../payment-failed.html');
	}

	

}
else {
	echo "<b>Checksum mismatched.</b>";
	header('location:../index.php?msg=transaction failed');
	//Process transaction as suspicious.
}

?>