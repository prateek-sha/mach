<?php


/*
*
*
	category
*
*
*/
   
   class Enquiry {
      /* Member variables */
      var $id;  
      var $fullname;
	  var $email;
	  var $message;
	  var $subject;	  
	  var $status;	 
	  var $con;
	  
	  
	function Enquiry()
	{
		//$this->con=mysqli_connect("localhost","mykt_icar-nrcss","+zfEe7ptcka3","mykt_icar-nrcss");
		$this->con=mysqli_connect("localhost","root","","mechanicalbazaar");
		
		mysqli_set_charset($this->con,'utf8');
	}	

	function closeConnection()
	{		
		mysqli_close($this->con);
	}		
	  
	function query_list($qry)
	{		
		$result = mysqli_query($this->con,$qry);
		
		$returnArray = array();
			
		if(mysqli_num_rows($result)>0)
		{
			$returnArray = array();
			$i=0;
			while ($row = mysqli_fetch_array($result))
			{				
				if ($row)
				{
					$returnArray[$i++] = $row;
				}
			}
		}
		return $returnArray;			
	}
 	function getEnquiryName($catid)
	  {
		  $where = "";
		  		  
		  $query = "SELECT name from enquiry where id='$catid' && status='1' ";

		  //echo $query;
		  
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
	function getRecordById()
	{
		$query = "SELECT * FROM enquiry where status=1 and id='".$this->id."'";
		
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
	
	  function getEnquiry($catid)
	  {
		$query = "SELECT * FROM enquiry where status=1 and id='".$catid."'";
// exit($query);
		$list = $this->query_list($query);
		if (count($list)==0)
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
		  		  
		  $query = "SELECT * from enquiry where status='1'";

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
	  function getData2()
	  {
	  	$sql = "Select enquiry . *,category.name category from category, enquiry where category.id=enquiry.category && enquiry.status='1'";

	  // exit($sql);

	  	$list = $this->query_list($sql);				
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
		  
		  $query = "SELECT count(id) count FROM enquiry where status=1 ";

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
		  $sql="INSERT INTO enquiry(fullname, email, subject, message) VALUES ('$this->fullname','$this->email','$this->subject','$this->message' )";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }
	  
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update enquiry set status=0 where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update enquiry set active_status='$this->active_status', addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }	  
   }
   
?>   