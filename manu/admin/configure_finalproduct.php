<?php


/*
*
*
	finalproduct
*
*
*/
   
   class FinalProducts {
      /* Member variables */
      var $id;
	  var $name;
	  var $image;
	  var $description;
	  var $price;
	  var $addeddate;	  
	  var $status;
	  var $active_status;
	  var $cadfile;
	  var $product_para;
	  var $con;
	  var $weight;
	  
	function FinalProducts()
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
		$query = "SELECT * FROM finalproduct where status='1' and active_status ='1'and product_para='".$this->product_para."'";
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
	function getRecordById1()
	{
		$query = "SELECT * FROM finalproduct where status='1' and active_status ='1'and id='".$this->id."'";
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
	   //	$sql = "Select finalproduct . *,category.name categoryname from category, finalproduct where category.id=finalproduct.categoryid && finalproduct.status=1";
	  //	$sql="Select users.*,category.name category name from category, users where category.id=users.categoryid";
	  
	  	$result = mysqli_query($this->con,$sql);
	  	if ($result)
	  		return true;
	  }
	  function getData()
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from finalproduct where status=1 order by id";

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
		  		  
		  $query = "SELECT * from finalproduct where status=1 && active_status='1' order by id";

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
	  function getDataFour()
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from finalproduct where status=1 && active_status='1' order by id DESC LIMIT 4";

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
		$query = "SELECT * FROM finalproduct where status=1 and active_status ='1' and categoryid='".$catid."'";

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
		$query = "SELECT * FROM finalproduct where status='1' and active_status ='1' and id='".$id."'";

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
	  function checkGet($id)
	  {
		$query = "SELECT * FROM finalproduct where product_para= '$this->product_para' and status='1' and active_status ='1' and id='".$id."'";

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
	  function getWeight1($id)
	  {
		$query = "SELECT weight FROM finalproduct where status='1' and active_status ='1' and id='".$id."'";

		  // exit($query);
		  
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
		  
		  $query = "SELECT count(id) count FROM finalproduct where status=1 and active_status ='1'";

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
		  $sql="INSERT INTO finalproduct (product_para,name,description,price,img,cadfile,addeddate,weight)
		VALUES
		(
		'$this->product_para',
		'$this->name',
        '$this->description',
        '$this->price',
        '$this->image',
        '$this->cadfile',
		'$this->addeddate',
		'$this->weight'
		)";
        //exit($sql);

		$result = mysqli_query($this->con, $sql);
        if($result)
			return true;
	  }

	  function updateRecord()
	  {
		  $sql="update finalproduct set product_para = '$this->product_para', name ='$this->name', description = '$this->description', price='$this->price',
		   img = '$this->image' , cadfile = '$this->cadfile' ,addeddate ='$this->addeddate' , weight='$this->weight'where id = '$this->id' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update finalproduct set status=0, addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update finalproduct set active_status='$this->active_status', addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
  	  function price_change_active_status()
	  {
		  $result = mysqli_query($this->con,"update finalproduct set active_price='$this->active_price',addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  // function price_change_active_status()
	  // {
		 //  $result = mysqli_query($this->con,"update finalproduct set active_price=0, addeddate='$this->addeddate' where id='".$this->id."'");
		 //  if($result)
			// return true;
	  // }
   }
   
   
?>   