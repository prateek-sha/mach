<?php


/*
*
*
	category
*
*
*/
   
   class Checkout {
      /* Member variables */
      var $id;  
	  var $product_para;
	  var $product_id;
	  var $manu_id;
	  var $user_id;
	  var $ordernum;
	  var $productname;
	  var $productprice;
	  var $productquantity;
	  var $addeddate;
	  var $dispacted;
	  var $delivered;
	  var $firstname;
	  var $lastname;
	  var $country;
	  var $street;
	  var $street1;
	  var $email;
	  var $phonenumber;
	  var $zipcode;
	  var $city;
	  var $payment;
	  var $cust_id;
	  var $txn_amount;
	  var $order_id;
	 
	  
	function Checkout()
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
		  		  
		  $query = "SELECT name from category where id='$catid' && status='1' && active_status='1' ";

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
		$query = "SELECT * FROM category where status=1 and active_status='1' and id='".$this->id."'";
		
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
	function getRecordByOrderId($order)
	{
		$query = "SELECT * FROM orders where payment='1' and  ordernum='$order' ";
		
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
		$query = "SELECT * FROM category where status=1 and active_status='1' and id='".$catid."'";
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
		$query = "SELECT * FROM category where status=1 and active_status='1' and id='$this->id'";
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
		  $sql="INSERT INTO orders(product_para,product_id,manu_id,user_id,ordernum,productname,
		  productprice,productquantity,addeddate,firstname,lastname,
		  country, street, street1, email, phonenumber, zipcode, city ) 
		  VALUES 
		  ('$this->product_para','$this->product_id','$this->manu_id','$this->user_id','$this->ordernum'
		  ,'$this->productname','$this->productprice','$this->productquantity','$this->addeddate'
		  ,'$this->firstname','$this->lastname','$this->country','$this->street',
		  '$this->street1','$this->email','$this->phonenumber','$this->zipcode','$this->city')";

		//echo $sql;
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }
	  function addorder()
	  {
		  $sql="INSERT INTO finalorder( order_id, txn_amount) 
		  VALUES 
		  ('$this->order_id','$this->txn_amount')";

		//echo $sql;
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
	  function updatePayment($orderid)
	  {
		  $sql="update orders set payment = '1' where ordernum ='$orderid'";

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