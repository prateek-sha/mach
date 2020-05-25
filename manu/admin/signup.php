<?php ob_start(); ?>

<?php
include ('configure_user.php');
$User_object = new User();

if($_SERVER['REQUEST_METHOD']=='POST')
{

	if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["salutation"]) && !empty($_POST["title"]) 
	&& !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["companyname"]) && !empty($_POST["street"])
	&& !empty($_POST["postcode"]) && !empty($_POST["city"]) && !empty($_POST["region"]) && !empty($_POST["phonenumber"])
	&& !empty($_POST["mobilenumber"]) )
	{
		
		$d=mktime(11, 14, 54, 8, 12, 2014);
		$User_object->username=$_POST['username'];
		$User_object->password=$_POST['password'];
		$User_object->email=$_POST['email'];
		$User_object->salutation=$_POST['salutation'];
		$User_object->title=$_POST['title'];
		$User_object->firstname=$_POST['firstname'];
		$User_object->lastname=$_POST['lastname'];
		$User_object->companyname=$_POST['companyname'];
		$User_object->street=$_POST['street'];
		$User_object->postcode=$_POST['postcode'];
		$User_object->city=$_POST['city'];
		$User_object->region=$_POST['region'];
		$User_object->phonenumber=$_POST['phonenumber'];
		$User_object->mobilenumber=$_POST['mobilenumber'];
		$User_object->createddate=date("Y-m-d h:i:sa", $d);

		$row = $User_object->EmailAndPhoneCheck();
		if ($row == FALSE){
			if ($User_object->addRecord()){
				header('Location: ../website/otp-verification.php?phn='.$_POST["phonenumber"].'&email='.$_POST["email"].'&uname='.$_POST["username"]   );
			}	
		}
		else{
			echo "Email or Phone Number already exits try with another Email or Phone Number.";
		}

		

	}
}

$User_object->closeConnection();

?>
<?php ob_flush(); ?>