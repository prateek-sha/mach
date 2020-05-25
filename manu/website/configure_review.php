<?php


/*
*
*
	category
*
*
*/
   
   class Review {
      /* Member variables */
      var $id;  
	  var $manu_id;
	  var $user_id;
	  var $product_para;	  
	  var $star;	 
	  var $con;
      var $type;
      var $addeddate;
	  var $number_of_star;	  
	  
	function Review()
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
 	function checkReview()
	  {
		  		  
		  $query = "SELECT * from review where user_id='$this->user_id' and manu_id ='$this->manu_id' and product_para='$this->product_para' and type = '$this->type'";

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
	function insert()
    {
        $sql="INSERT INTO review(manu_id, user_id , product_para , addeddate, number_of_star, type) 
        VALUES 
        ('$this->manu_id', '$this->user_id', '$this->product_para', '$this->addeddate','$this->number_of_star','$this->type' )";

      $result = mysqli_query($this->con,$sql);
      if($result)
          return true;
    }
	
	  function getOrders($catid)
	  {
		$query = "SELECT * FROM orders where payment=1  and user_id='".$catid."'";
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
	  function getAverage()
	  {
		$query = "SELECT AVG(number_of_star) FROM review where manu_id='$this->manu_id'  and product_para='$this->product_para' ";
//echo $query;
		$list = $this->query_list($query);
		if (count($list)==0)
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
	  function getCategoryData($catid)
	  {
		$query = "SELECT * FROM orders where payment=1 and user_id='$catid' and id='$this->id'";
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
		  		  
		  $query = "SELECT * from category where id='$catid' and status=1 and active_status='1'" ; 

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
		  		  
		  $query = "SELECT * from category where active_status='1'";

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
		  		  
		  $query = "SELECT * from category where status='1' && active_status='1' && id='".$catid."'";

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
		  $sql="INSERT INTO category(name, mainproductid , active_status) 
		  VALUES 
		  ('".$this->f($this->name)."','$this->mainproductid' ,'1')";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }
	  
	  
	  function updateRecord()
	  {
		  $sql="update category set name='$this->name',mainproductid='$this->mainproductid' ,addeddate='$this->addeddate' where id='$this->id'";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update category set status=0, addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update category set active_status='$this->active_status', addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }	  
   }
   
?>   