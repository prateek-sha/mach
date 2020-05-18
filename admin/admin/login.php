<?php ob_start(); ?>

<?php
@session_start();
include ('configure_admin.php');

if(!empty($_POST["username"]) && !empty($_POST["password"]))
{	
	$admin_object = new Admin();
	$admin_object->username=$_POST["username"];
	$admin_object->password=$_POST["password"];		
	$row = $admin_object->loginCheck();
	
	if($row==false)
	{
		$count=0;
	}
	else
	{		
		$count=count($row);
	}
	
	if($count>0)
	{		
			$_SESSION['username'] = $admin_object->username;
			header('Location: category_list.php');
	}
	else
	{
		
		header('Location: category_list.php');
		exit();
	}
}
else
{
	$_SESSION['error'] = "Username and Password must be suplied to login.";
	header('Location: category_list.php');
	exit();
}

?>
<?php ob_flush(); ?>