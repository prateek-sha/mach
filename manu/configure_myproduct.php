<?php


/*
*
*
	productinventry
*
*
*/
   
   class MyProducts {
      /* Member variables */
      var $id;
      var $quantity;
      var $manuid;
      var $product_para;
	  var $addeddate;	  
	  var $con;
	  
	function MyProducts()
	{

		$this->con=mysqli_connect("localhost","root","","mechanicalbazaar");
		
		mysqli_set_charset($this->con,'utf8');
	}	

	function closeConnection()
	{		
		mysqli_close($this->con);
	}		
	function f($val)
	{
		return mysqli_real_escape_string($this->con,$val);
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

	function getRecordById()
	{
		$query = "SELECT * FROM productinventry where status=1 and active_status ='1'and id='".$this->id."'";
		
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

    function checkrepeat()
    {
		$query = "SELECT * FROM productinventry where product_para='".$this->product_para."' and  manu_id='".$this->manuid."' ";
        
        
        //exit($query);
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



	function getCategoryData()
	  {
	   //	$sql = "Select productinventry . *,category.name categoryname from category, productinventry where category.id=productinventry.categoryid && productinventry.status=1";
	  //	$sql="Select users.*,category.name category name from category, users where category.id=users.categoryid";
	  
	  	$result = mysqli_query($this->con,$sql);
	  	if ($result)
	  		return true;
	  }
	  function getData()
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from productinventry where status=1 order by id";

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
	  function getData1()
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from productinventry where status=1 && active_status='1' order by id";

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
	     function getProducts($manuid)
	  {
		$query = "SELECT * FROM productinventry where  manu_id='".$manuid."'";

		  // exit($query);
		
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

	  function getProductByQuantity($quantity)
	  {
		$query = "SELECT * FROM productinventry where  quantity >= '".$quantity."'";

		  // exit($query);
		
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


	  function getProducts1($id)
	  {
		$query = "SELECT * FROM Products where status=1 and active_status ='1' and id='".$id."'";

		  // exit($query);
		  
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
		  
		  $query = "SELECT count(id) count FROM productinventry where status=1 and active_status ='1'";

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
		  $sql="INSERT INTO productinventry (manu_id,product_para,addeddate,quantity)
		VALUES
		(
		'$this->manuid',
		'$this->product_para',
		'$this->addeddate',
        '$this->quantity'		
		)";
		//exit($sql);
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }

	  function updateRecord()
	  {
		  $sql="update productinventry set manu_id ='$this->manuid',product_para ='$this->product_para', quantity='$this->quantity',addeddate ='$this->addeddate'where id = '$this->id' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update productinventry set status=0, addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update productinventry set active_status='$this->active_status', addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
  	  function price_change_active_status()
	  {
		  $result = mysqli_query($this->con,"update productinventry set active_price='$this->active_price',addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  // function price_change_active_status()
	  // {
		 //  $result = mysqli_query($this->con,"update productinventry set active_price=0, addeddate='$this->addeddate' where id='".$this->id."'");
		 //  if($result)
			// return true;
	  // }
   }
   
   
?>   