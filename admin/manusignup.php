<?php ob_start(); ?>

<?php
date_default_timezone_set("Asia/Kolkata");
include ('configure_manu.php');
$Manufacture_object = new Manufacture();

if($_SERVER['REQUEST_METHOD']=='POST')
{

	if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["salutation"]) && !empty($_POST["title"]) 
	&& !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["companyname"]) && !empty($_POST["street"])
	&& !empty($_POST["postcode"]) && !empty($_POST["city"]) && !empty($_POST["region"]) && !empty($_POST["phonenumber"])
	&& !empty($_POST["mobilenumber"]) )
	{
		
		$Manufacture_object->username=$_POST['username'];
		$Manufacture_object->password=$_POST['password'];
		$Manufacture_object->email=$_POST['email'];
		$Manufacture_object->salutation=$_POST['salutation'];
		$Manufacture_object->title=$_POST['title'];
		$Manufacture_object->firstname=$_POST['firstname'];
		$Manufacture_object->lastname=$_POST['lastname'];
		$Manufacture_object->companyname=$_POST['companyname'];
		$Manufacture_object->street=$_POST['street'];
		$Manufacture_object->postcode=$_POST['postcode'];
		$Manufacture_object->city=$_POST['city'];
		$Manufacture_object->region=$_POST['region'];
		$Manufacture_object->phonenumber=$_POST['phonenumber'];
        $Manufacture_object->mobilenumber=$_POST['mobilenumber'];
        $Manufacture_object->faxnumber=$_POST['faxnumber'];
        $Manufacture_object->faxemail=$_POST['faxemail'];
		$Manufacture_object->createddate= date("Y-m-d H:i:s");

		$row = $Manufacture_object->EmailAndPhoneCheck();
		if ($row == FALSE){
			if ($Manufacture_object->addRecord()){
				header('Location: ../website/otp-verification-m.php?phn='.$_POST["phonenumber"].'&email='.$_POST["email"].'&uname='.$_POST["username"]   );
			}	
		}
		else{
			echo "Email or Phone Number already exits try with another Email or Phone Number.";
		}

		

	}
}

$Manufacture_object->closeConnection();

?>
<?php ob_flush(); ?>