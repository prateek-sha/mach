<?php
date_default_timezone_set("Asia/Kolkata");
include 'sessioncheck.php';
include 'header.php';
include ('configure_maincategory.php');
include ('configure_products.php');
$pro=new Products();
$prolist=$pro->getData();
$pro->closeconnection();	

$name=$addeddate=$status=$attachment="";

$id=0;

if($_SERVER['REQUEST_METHOD']=="POST")
{		
$id=$_POST['id'];
$karya_object = new MainCategory();
//Adding Data into Object
$karya_object->id=$id;
$karya_object->name = $_POST['name'];
$karya_object->addeddate =  date("Y-m-d H:i:s");
	
if($id==0)
{	
	//Calling add Function to add data into database
	$karya_object->addRecord();			
	$_SESSION['msg'] = "1 category record added";			
}
else
{	
	$karya_object->UpdateRecord();		
	$_SESSION['msg'] = "1 category record Updated";			
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

header("Location: maincategory_list.php");
exit();
	
}
else
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		
		$karya_object = new Category();
		
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
<script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>

<link rel="stylesheet" href="assets/ckeditor/samples/css/samples.css">
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
						<li><i class="fa fa-home"></i><a href="category_list.php">Category List</a></li>
						<li><i class="fa fa-laptop"></i>Add/Edit Category</li>
					</ol>
				</div>
			</div>
		<div class="row">
			
				 <div class="col-md-12 portlets">
              <div class="panel panel-default">
                <div class="panel-Name">
                  <div class="pull-left">Add/Edit Category</div>
							
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
						  <form class="form-horizontal" method="POST" enctype="multipart/form-data">
							  <!-- Title -->
							  <div class="form-group">
								<label class="control-label col-lg-1" for="id">ID</label>
								<div class="col-lg-10"> 
								  <input type="text" class="form-control" name="id" id="id" readonly value="<?php echo $id; ?>">
								</div>
							  </div>
							  							  
														<!-- Title -->
							  <div class="form-group col-lg-6">
								<label class="control-label col-lg-2" for="Name">Name</label>
								<div class="col-lg-10"> 
								  <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
								</div>
							  </div>

							  
							  <!--IMAGE-->

							  							
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



  <?php include('footer.php'); ?>
  </body>
</html>
			
			