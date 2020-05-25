<?php
date_default_timezone_set("Asia/Kolkata");
require_once('sessioncheck.php');
include ('configure_products.php');
include ('configure_category.php');
$cat=new Category();
$catlist=$cat->getData2();
$cat->closeconnection();	

$page_products="products";
$name="";
$categoryid="";
$description="";
$attachment="";
$attachments="";
$maxprice="";
$minprice="";
$addeddate="";
$id=0;

if($_SERVER['REQUEST_METHOD']=="POST")
{		
$id=$_POST['id'];
//Creating Object of Userrole Class
$karya_object = new Products();
//Adding Data into Object
$karya_object->name = $_POST['name'];
$karya_object->categoryid= $_POST['categoryid'];
$karya_object->id=$_POST['id'];
/*$karya_object->status = $_POST['status'];
$karya_object->active_status = $_POST['active_status'];
$karya_object->active_price = $_POST['active_price'];*/
$karya_object->addeddate = date("Y-m-d H:i:s");

if($id==0)
{	
	//Calling add Function to add data into database
	$karya_object->addRecord();			
	$_SESSION['msg'] = "1 Product record added";			
}
else
{
	$karya_object->UpdateRecord();		
	$_SESSION['msg'] = "1 Product record Updated";			
}

if(isset($_POST['todelete']) && $_POST['todelete']!="" )
{
	$file_text = explode(",",substr($_POST['todelete'],0,strlen($_POST['todelete'])-1));
	
	foreach($file_text as $js)
	{		
		$file = $_SERVER['DOCUMENT_ROOT'] . "/upload/" . $js;		
		if (!unlink($file))
		{
			echo ("Error deleting $file");
		}		
	}	
}
//calling connection close function
$karya_object->closeconnection();	


header("Location: product_list.php");
exit();
	
}
else
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		
		$karya_object = new Products();
		
		//Adding Data into Object		
		$karya_object->id=$id;
		
		$row = $karya_object->getrecordbyid();
		
		$count=count($row);

		if($count<1)
		{
			echo "Error in fetching record";
			exit();
		}
				
		$name = $row[0]['name'];
		$addeddate = $row[0]['addeddate'];
		$categoryid=$row[0]['categoryid'];

	}
}

?>
<!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
	<?php
		include 'siteheader.php';
	
		include 'sidebar.php';
	?>
	
	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">					
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="product_list.php">Parameter Value List</a></li>
						<li><i class="fa fa-laptop"></i>Add/Edit Parameter value</li>						  	
					</ol>
				</div>
			</div>
			
			
			
		<div class="row">
			
				 <div class="col-md-12 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Add/Edit Product</div>
							
							<?php				
								if(!empty($_SESSION['msg']))
								{
									echo "<p style='color:red;'>". $_SESSION['msg']. "</p>";
									$_SESSION['msg']='';
								}	
							?>
							
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    
                      <div class="form quick-post">
						  <!-- Edit Course -->
						  <form class="form-horizontal" method="POST" enctype="multipart/form-data"  >
							  <!-- Title -->
							  <div class="form-group">
								<label class="control-label col-lg-1" for="id">ID</label>
								<div class="col-lg-10"> 
								  <input type="text" class="form-control" name="id" id="id" readonly value="<?php echo $id; ?>">
								</div>
							  </div>

							<div class="form-group col-lg-12">	
							 <label class="control-label col-lg-1" for="categoryid">Category ID</label>
							 <div class="col-lg-10"> 
							  <select name="categoryid" class="form-control">
							  	<option value="0">Select Category Id</option>
							  		<?php
							  		foreach($catlist as $row)
							  		{?>
							  			<option value="<?php echo $row['id'];?>"
							  				<?php
							  				if ($row['id']==$categoryid)
							  				{
							  					echo "Selected";
							  				}
							  				else
							  				{
							  					echo "";
							  				}
							  				?> >
							  				<?php echo $row['name'];?>
							  				
							  			</option>
							  			<?php
							  		}
							  		?>
							  	</option>
							  </select>
							</div>
							</div>
														<!-- Title -->
							  <div class="form-group col-lg-12">
								<label class="control-label col-lg-1" for="name">Name</label>
								<div class="col-lg-10"> 
								  <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
								</div>
							  </div>
							  <!-- Buttons -->
							  <div class="form-group">
								 <!-- Buttons -->
								 <div class="col-lg-offset-2 col-lg-9">
									<button type="submit" class="btn btn-primary">SAVE</button>												
									<button type="reset" class="btn btn-default">Reset</button>
								 </div>
							  </div>
						  </form>
						</div>
	  

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->
			  
			   </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->
  
  <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <!-- jquery ui -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom checkbox & radio-->
    <script type="text/javascript" src="js/ga.js"></script>
    <!--custom switch-->
    <script src="js/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script src="js/jquery.tagsinput.js"></script>
    
    <!-- colorpicker -->
   
    <!-- bootstrap-wysiwyg -->
    <script src="js/jquery.hotkeys.js"></script>
    <script src="js/bootstrap-wysiwyg.js"></script>
    <script src="js/bootstrap-wysiwyg-custom.js"></script>
    
    <!-- custom form component script for this page-->
    <script src="js/form-component.js"></script>
    <!-- custome script for all page -->
    <script src="js/scripts.js"></script>
 
   <script>
  function deleteimage(imagetext,div)
  {
	  var original = $("#attachments").val();
	  original = original.replace(imagetext+",","");
	  $("#attachments").val(original);
	$("#"+div).remove();
	
	var newtext = $("#todelete").val();
	newtext = newtext + imagetext + ",";
	$("#todelete").val(newtext);
  }
  
  </script>

  </body>
</html>
			
			