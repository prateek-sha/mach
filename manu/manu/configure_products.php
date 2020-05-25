<?php


/*
*
*
	products
*
*
*/
   
   class Products {
      /* Member variables */
      var $id;
	  var $name;
	  var $image;
	  var $categoryid;
	  var $categoryname;
	  var $description;
	  var $minprice;
	  var $maxprice;
	  var $addeddate;	  
	  var $status;
	  var $active_status;
	  var $active_price;
	  var $con;
	  
	function Products()
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
		$query = "SELECT * FROM products where status=1 and active_status ='1'and id='".$this->id."'";
		
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
	   //	$sql = "Select products . *,category.name categoryname from category, products where category.id=products.categoryid && products.status=1";
	  //	$sql="Select users.*,category.name category name from category, users where category.id=users.categoryid";
	  
	  	$result = mysqli_query($this->con,$sql);
	  	if ($result)
	  		return true;
	  }
	  function getData()
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from products where status=1 order by id";

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
		  		  
		  $query = "SELECT * from products where status=1 && active_status='1' order by id";

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
	     function getProducts($catid)
	  {
		$query = "SELECT * FROM products where status=1 and active_status ='1' and categoryid='".$catid."'";

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
		  
		  $query = "SELECT count(id) count FROM products where status=1 and active_status ='1'";

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
		  $sql="INSERT INTO products (categoryid,name,addeddate)
		VALUES
		(
		'$this->categoryid',
		'".$this->f($this->name)."',
		'$this->addeddate'		
		)";
		//exit($sql);
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }

	  function updateRecord()
	  {
		  $sql="update products set categoryid ='$this->categoryid',name ='".$this->f($this->name)."',addeddate ='$this->addeddate'where id = '$this->id' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update products set status=0, addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update products set active_status='$this->active_status', addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
  	  function price_change_active_status()
	  {
		  $result = mysqli_query($this->con,"update products set active_price='$this->active_price',addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  // function price_change_active_status()
	  // {
		 //  $result = mysqli_query($this->con,"update products set active_price=0, addeddate='$this->addeddate' where id='".$this->id."'");
		 //  if($result)
			// return true;
	  // }
   }
   
   
?>   