<?php


/*
*
*
	weight
*
*
*/
   
   class Weight {
      /* Member variables */
      var $id;  
	  var $min;
	  var $max;
	  var $addeddate;	  
      var $status;
      var $active_status;	 
      var $price;	 
	  var $con;
	  var $name;	  
      
      
	function Weight()
	{
		
		$this->con=mysqli_connect("localhost","root","","mechanicalbazaar");
		
		mysqli_set_charset($this->con,'utf8');
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
 	function getCategoryName($catid)
	  {
		  $where = "";
		  		  
		  $query = "SELECT name from weight where id='$catid' && status='1' && active_status='1' ";

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
		$query = "SELECT * FROM weight where status=1 and active_status='1' and id='".$this->id."'";
		
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
	
	  function getCategory($catid)
	  {
		$query = "SELECT * FROM weight where status=1 and active_status='1' and id='".$catid."'";
//echo $query;
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
	  function getCategoryData($catid)
	  {
		$query = "SELECT * FROM weight where status=1 and active_status='1' and id='$this->id'";
//echo $query;
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
	  function getCategoryData1($catid)
	  {
	  	$where = "";
		  		  
		  $query = "SELECT * from weight where id='$catid' and status=1 and active_status='1'" ; 

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
	  function getData()
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from weight where status='1'";

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

	  function getData1($catid)
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from weight where status='1' && active_status='1' && id='".$catid."'";

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
	  function getPrice($w)
	  {
		  $where = "";
		  		  
		  $query = "SELECT price from weight where status='1' and active_status='1' and min < $w and max > $w ";

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
	  
	  
	  function countData()
	  {
		  
		  $query = "SELECT count(id) count FROM members where status=1  and active_status='1'";

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
		  $sql="INSERT INTO weight(min, max, price, addeddate) 
		  VALUES 
		  ('$this->min','$this->max','$this->price','$this->addeddate')";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }
	  
	  
	  function updateRecord()
	  {
		  $sql="update weight set min='$this->min', max='$this->max', price='$this->price' ,addeddate='$this->addeddate' where id='$this->id'";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update weight set status=0, addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update weight set active_status='$this->active_status', addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }	  
   }
   
?>   