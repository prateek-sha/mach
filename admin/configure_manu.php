<?php


/*
*
*
	Manufacture
*
*
*/
   
   class Manufacture {
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
      var $faxnumber;
      var $faxemail;

	  
	function Manufacture()
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
		$query = "SELECT * FROM Manufacture where email='".$this->email."' and password='".$this->password."' 
		   and otpverified = '1' and emailverified='1' ";
		
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
		$query = "SELECT * FROM Manufacture where email='".$this->email."'" ;
		
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

	function otpverified()
	{
		$sql=" update Manufacture set 
	  otpverified ='1'
	  where 
	  email ='$this->email' ";

	  $result = mysqli_query($this->con,$sql);
	  if($result)
		  return true;
  }
	function getRecordById($email)
	{
		$query = "SELECT * FROM Manufacture where email='".$email."'";
		
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
				  
		$query = "SELECT * from Manufacture where otpverified='1'";

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
		  $query = "SELECT count(id) count FROM Manufacture where  username like '%".$this->username."%' ";

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
	  function addRecord()
	  {
		  $sql="INSERT INTO Manufacture (username,password,salutation,title,firstname,lastname,companyname,street,postcode,city,region,phonenumber,mobilenumber,createdate,email,faxnumber,faxemail)
		VALUES
		('".$this->f($this->username)."','$this->password','".$this->f($this->salutation)."','$this->title','$this->firstname','$this->lastname','".$this->f($this->companyname)."','$this->street','$this->postcode','$this->city','$this->region','$this->phonenumber','$this->mobilenumber','$this->createddate' ,'$this->email','$this->faxnumber','$this->faxemail')";
		
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;

	  }
	  
	  function updateRecord()
	  {
		  $sql="update Manufacture set 
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
		  $sql="update Manufacture set 		
		password ='$this->password'
		where 
		username = '$this->username' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update Manufacture set status=0 where id='".$this->id."'");
		  if($result)
			return true;
	  }

	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update Manufacture set emailverified='$this->emailverified' where id='".$this->id."'");
		  if($result)
			return true;
	  }	  
   }
   
?>   