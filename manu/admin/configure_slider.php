<?php


/*
*
*
	slider
*
*
*/
   
   class Slider {
      /* Member variables */
      var $id;  
	  var $title;
	  var $description;
	  var $image;
	  var $addeddate;	  
	  var $status;	 
	  var $con;
	  
	  
	function Slider()
	{
		//$this->con=mysqli_connect("localhost","mykt_icar-nrcss","+zfEe7ptcka3","mykt_icar-nrcss");
		$this->con=mysqli_connect("localhost","root","","ecommerce");
		
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
 	function getslidertitle($catid)
	  {
		  $where = "";
		  		  
		  $query = "SELECT title from slider where id='$catid' && status='1' ";

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
		$query = "SELECT * FROM slider where status=1 and id='".$this->id."'";
		
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
		  		  
		  $query = "SELECT * from slider where status='1' ";

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
		  		  
		  $query = "SELECT * from slider where status='1' && active_status='1' ";

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
		  
		  $query = "SELECT count(id) count FROM slider where status=1 ";

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
		  $sql="INSERT INTO slider(title, image,active_status) VALUES ('".$this->f($this->title)."','$this->image','0')";
		
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }
	  
	  function updateRecord()
	  {
		  $sql="update slider set title='".$this->f($this->title)."',image='$this->image',addeddate='$this->addeddate' where id='$this->id'";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update slider set status=0, addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update slider set active_status='$this->active_status', addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }	  
   }
   
?>   