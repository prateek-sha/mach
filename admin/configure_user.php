<?php


/*
*
*
	User
*
*
*/
   
   class User {
      /* Member variables */
      var $id;
	  var $username; 	  
	  var $password;
	  var $email;
	  var $createddate;
	  var $salutation;
	  var $title;
	  var $firstname;
	  var $lastname;
	  var $companyname;
	  var $street;
	  var $postcode;
	  var $city;
	  var $region;
	  var $phonenumber;
	  var $mobilenumber;
	  var $otpverified;
	  var $emailverified;
	  
	function User()
	{

		$this->con=mysqli_connect("localhost","root","","mechanicalbazaar");
	}	
	function f($val)
	{
		return mysqli_real_escape_string($this->con,$val);
	}
	function closeConnection()
	{		
		mysqli_close($this->con);
	}		
	  
	function query_list($qry)
	{		
		$result = mysqli_query($this->con,$qry);
		$returnArray = array();
		$i=0;
		while ($row = mysqli_fetch_array($result))
		{				
			if ($row)
			{
				$returnArray[$i++] = $row;
			}
		}
		return $returnArray;			
	}
//have check for both phn and mail otp
	function loginCheck()
	{
		$query = "SELECT * FROM user where email='".$this->email."' and password='".$this->password."' and otpverified = '1' ";
		
		$list = $this->query_list($query);				
		if(count($list) == 0)
		{
			return false;
			exit();
		}
		else
		{
			return $list;
			exit();
		}
	}
	
	function EmailCheck()
	{
		$query = "SELECT * FROM user where email='".$this->email."'" ;
		
		$list = $this->query_list($query);				
		if(count($list) == 0)
		{
			return false;
			exit();
		}
		else
		{
			return $list;
			exit();
		}
	}
	function EmailAndPhoneCheck()
	{
		$query = "SELECT * FROM user where ( email='".$this->email."'  or phonenumber='".$this->phonenumber."' or mobilenumber='".$this->mobilenumber."' ) and ( otpverified= '1')" ;
		
		$list = $this->query_list($query);				
		if(count($list) == 0)
		{
			return false;
			exit();
		}
		else
		{
			return $list;
			exit();
		}
	}

	function getRecordById()
	{
		$query = "SELECT * FROM user where username='".$this->username."'";
		
		$list = $this->query_list($query);				
		if(count($list) == 0)
		{
			return false;
			exit();
		}
		else
		{
			return $list;
			exit();
		}
	}
	  
	function getData()
	{
		$where = "";
				  
		$query = "SELECT * from user where otpverified='1'";

		//echo $query;
		
		  $list = $this->query_list($query);				
		  if(count($list) == 0)
		  {
			  return false;
			  exit();
		  }
		  else
		  {
			  return $list;
			  exit();
		  }	
	}
	  
	  function countData()
	  {
		  $query = "SELECT count(id) count FROM user where  username like '%".$this->username."%' ";

			$list = $this->query_list($query);				
			if(count($list) == 0)
			{
				return false;
				exit();
			}
			else
			{
				return $list;
				exit();
			}	
	  }
	  function countData1()
	  {
		  $query = "SELECT count(id) count FROM user where  otpverified = '1' ";

			$list = $this->query_list($query);				
			if(count($list) == 0)
			{
				return false;
				exit();
			}
			else
			{
				return $list[0][0];
				exit();
			}	
	  }
	  function addRecord()
	  {
		  $sql="INSERT INTO user (username,password,salutation,title,firstname,lastname,companyname,street,postcode,city,region,phonenumber,mobilenumber,createdate,email)
		VALUES
		('".$this->f($this->username)."','$this->password','".$this->f($this->salutation)."','$this->title','$this->firstname','$this->lastname','".$this->f($this->companyname)."','$this->street','$this->postcode','$this->city','$this->region','$this->phonenumber','$this->mobilenumber','$this->createddate' ,'$this->email')";
		
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;

	  }

	  function otpverified()
	  {
		  $sql="update user set 
		otpverified ='1'
		where 
		email ='$this->email'";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function updateRecord()
	  {
		  $sql="update user set 
		username ='".$this->f($this->name)."',
		password ='$this->password',
		where 
		id = '$this->id' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	
	function updatePassword()
	  {
		  $sql="update user set 		
		password ='$this->password'
		where 
		username = '$this->username' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update user set status=0 where id='".$this->id."'");
		  if($result)
			return true;
	  }
   }
   
?>   