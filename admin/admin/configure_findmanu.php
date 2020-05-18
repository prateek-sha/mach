<?php


/*
*
*
	productinventry
*
*
*/
   
   class Findmanu {
      /* Member variables */
      var $id;  
	  var $description;
	  var $image;
	  var $addeddate;	  
	  var $status;	 
	  var $con;
	  var $name;
	  var $mainproductid;	  
	  
	function Findmanu()
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
    function getMaxQuant($para)
    {
        $where = "";
                  
        $query = "SELECT max(quantity) from productinventry where product_para='$para' ";

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



 	function getManuWithPara($para, $quant)
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from productinventry where product_para='$para' and  quantity >= '$quant' ";

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
      
      function getReviewWithPara($para, $manufid)
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from review where product_para='$para' and  manu_id = '$manufid' ";

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



	function getRecordById()
	{
		$query = "SELECT * FROM productinventry where status=1 and active_status='1' and id='".$this->id."'";
		
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

	function getRecordForDate($manu_id, $product_para)
	{
		$query = "SELECT * FROM orders where manu_id='$manu_id' and product_para = '$product_para' ";
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

	function getLastRecord($manu_id, $product_para)
	{
		$query = "SELECT * FROM orders where manu_id='$manu_id' and product_para = '$product_para' ";
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

	


	
	  function getCategory($catid)
	  {
		$query = "SELECT * FROM productinventry where status=1 and active_status='1' and id='".$catid."'";
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
		$query = "SELECT * FROM productinventry where status=1 and active_status='1' and id='$this->id'";
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
		  		  
		  $query = "SELECT * from productinventry where id='$catid' and status=1 and active_status='1'" ; 

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
		  		  
		  $query = "SELECT * from productinventry where active_status='1'";

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
		  		  
		  $query = "SELECT * from productinventry where status='1' && active_status='1' && id='".$catid."'";

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
		  $sql="INSERT INTO productinventry(name, mainproductid , active_status) 
		  VALUES 
		  ('".$this->f($this->name)."','$this->mainproductid' ,'1')";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }
	  
	  
	  function updateRecord()
	  {
		  $sql="update productinventry set name='$this->name',mainproductid='$this->mainproductid' ,addeddate='$this->addeddate' where id='$this->id'";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	function checkdate($dateone, $datetwo)
	{
		$date1 = strtotime($dateone);
		$date2 = strtotime($datetwo);

		$diff = abs($date2 - $date1);  
		$years = floor($diff / (365*60*60*24));  
		$months = floor(($diff - $years * 365*60*60*24)/(30*60*60*24));  
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		return $days;
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
   }
   
?>   