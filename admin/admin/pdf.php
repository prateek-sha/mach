<?php
date_default_timezone_set("Asia/Kolkata");
include 'sessioncheck.php';
include 'header.php';
include('configure_pdf.php');
$kraya_order = new Pdf();

if($_SERVER['REQUEST_METHOD']=="POST")
{		

if(isset($_POST['cadfile']))
{
	$cadfile=$_POST['cadfile'];
		
	if($_FILES['cadfile']['name']!="")
	{
		include("../manu/cad_file.php");
		
		$file = $_SERVER['DOCUMENT_ROOT'] . "/mech/admin/uploadpdf/" . $_POST['cadfile'];		
		if (!unlink($file))
		{
			echo ("Error deleting $file");
		}
	}
	
}

else
{
	if($_FILES['cadfile']['name']=="")
	{
		$_SESSION['msg'] = "Please attach a file and try again to insert crop";
		header("Location: pdf.php");
		exit();
	}
	else
	{
		include("../manu/cad_file.php");
	}
}
$kraya_order->pdf = $cadfile;
if ( $kraya_order->countData() == 1 ){
    $kraya_order->updateRecord();
}
else{
    $kraya_order->addRecord();
}
header("Location: pdf.php");

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
						<li><i class="fa fa-home"></i><a href="category_list.php">Upload Pdf</a></li>
					</ol>
				</div>
			</div>
		<div class="row">
			
				 <div class="col-md-12 portlets">
              <div class="panel panel-default">
                <div class="panel-Name">
                  <div class="pull-left">Add/Edit Pdf</div>
							
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
							  <div class="form-group col-lg-6">
								<label class="control-label col-lg-2" for="Name">Pdf</label>
								<div class="col-lg-10"> 

								  <input type="file" class="form-control" name="cadfile" id="cadfile" >
								</div>
							  </div>
                                <?php    if ( $kraya_order->countData() == 1 ){ ?>
                            <p>Already Uploaded</p>
                              <?php } ?>
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
			
			