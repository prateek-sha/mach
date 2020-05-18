<?php


/*
*
*
	Admin
*
*
*/
   
   class ManuAdmin {
      /* Member variables */
      var $id;
	  var $username; 	  
	  var $password;
	  var $email;
	  
	function Admin()
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

	function loginCheck()
	{
		$query = "SELECT * FROM manufacture where email='".$this->email."' and password='".$this->password."'";
		
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
		$query = "SELECT * FROM manufacture where username='".$this->username."'";
		
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
	  
	  function getData($start,$records)
	  {
		  $start--;
		  
			$start = $start * 10;		  
		  
		  $query = "SELECT * FROM manufacture where username like '%".$this->username."%'  ";

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
		  $query = "SELECT count(id) count FROM manufacture where  username like '%".$this->username."%' ";

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
		  $sql="INSERT INTO manufacture (username,password)
		VALUES
		('".$this->f($this->username)."',
		'$this->password'
		)";
		
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }
	  
	  function updateRecord()
	  {
		  $sql="update manufacture set 
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
		  $sql="update manufacture set 		
		password ='$this->password'
		where 
		username = '$this->username' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update manufacture set status=0 where id='".$this->id."'");
		  if($result)
			return true;
	  }
   }
   
?>   