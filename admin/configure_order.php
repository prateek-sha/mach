<?php


/*
*
*
	orders
*
*
*/
   
   class Order {
      /* Member variables */
      var $id;  
	  var $description;
	  var $image;
	  var $addeddate;	  
	  var $status;	 
	  var $con;
	  var $name;
	  var $manu_id;
      var $mainproductid;
      var $dispacted;
	  var $delivered;	
	  var $cadfile;  
	  var $number;
	  
	function Order()
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
		  		  
		  $query = "SELECT name from orders where id='$catid' && status='1' && active_status='1' ";

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
		$query = "SELECT * FROM orders where status=1 and active_status='1' and id='".$this->id."'";
		
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
	function getRecordByManuId()
	{
		$query = "SELECT * FROM orders where payment=1 and manu_id='".$this->manu_id."'";
		
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
		$query = "SELECT * FROM orders where status=1 and active_status='1' and id='".$catid."'";
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
		$query = "SELECT * FROM orders where status=1 and active_status='1' and id='$this->id'";
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
		  		  
		  $query = "SELECT * from orders where id='$catid' and status=1 and active_status='1'" ; 

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
		  		  
		  $query = "SELECT * from orders where payment='1'";

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
	  function getDataBydate()
	  {
		  	
		  $query = "SELECT * from orders where and payment='1'  and ";

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
		  		  
		  $query = "SELECT * from orders where status='1' && active_status='1' && id='".$catid."'";

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
		  $sql="INSERT INTO orders(name, mainproductid , active_status) 
		  VALUES 
		  ('".$this->f($this->name)."','$this->mainproductid' ,'1')";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }

	  
	  
	  function updateRecord()
	  {
		  $sql="update orders set name='$this->name',mainproductid='$this->mainproductid' ,addeddate='$this->addeddate' where id='$this->id'";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function addPdf()
	  {
		  $sql="update orders set pdf='$this->cadfile' where id='$this->id'";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update orders set status=0, addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_dispacted_status()
	  {
		  $result = mysqli_query($this->con,"update orders set dispacted='$this->dispacted' where id='".$this->id."'");
		  if($result)
			return true;
	  }	  
	  function change_delivered_status()
	  {
		  $result = mysqli_query($this->con,"update orders set delivered='$this->delivered' where id='".$this->id."'");
		  if($result)
			return true;
	  }	  
   }
   
?>   