<?php


/*
*
*
	manufacturedetailsDetails
*
*
*/
   
   class manufacturedetails {
      /* Member variables */
      var $id;
      var $mannuid;
      var $img;
      var $documenttype;
      var $gstnumber;
      var $pannumber;


	  
	function manufacturedetails()
	{

		$this->con=mysqli_connect("localhost","root","","mechanicalbazaar");
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
		$i=0;
		while ($row = mysqli_fetch_array($result))
		{				
			if ($row)
			{
				$returnArray[$i++] = $row;
			}
		}
		return $returnArray;			
	}

	

	function getRecordById()
	{
		$query = "SELECT * FROM manufacturedetails where manuid='".$this->manuid."'";
		
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
		  $sql="INSERT INTO manufacturedetails (manuid, documenttype, img, pannumber, gstnumber )
		VALUES
		('$this->manuid','$this->documenttype','$this->img','$this->pannumber','$this->gstnumber')";
		
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;

	  }
	  
	  function updateRecord()
	  {
		  $sql="update manufacturedetails set 
		username ='".$this->f($this->name)."',
		password ='$this->password',
		where 
		id = '$this->id' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	
	function updatePassword()
	  {
		  $sql="update manufacturedetails set 		
		password ='$this->password'
		where 
		username = '$this->username' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update manufacturedetails set status=0 where id='".$this->id."'");
		  if($result)
			return true;
	  }
   }
   
?>   