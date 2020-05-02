<?php
date_default_timezone_set("Asia/Kolkata");
include 'sessioncheck.php';
include 'header.php';
include ('configure_manudetails.php');
$karya_object = new manufacturedetails();
//calling connection close function
$id=$_GET['id'];
$documenttype=$pannumber=$gstnumber=$attachment='';
if (isset($_GET['id'])){
	$karya_object->manuid = $_GET['id'];
	$row = $karya_object->getRecordById();
	if ($row == FALSE){
		echo  "error";
		//header('location: manufacture_list.php');
	}
	else{
		$documenttype = $row[0]['documenttype'];
		$pannumber = $row[0]['pannumber'];
		$gstnumber = $row[0]['gstnumber'];
		$attachment = $row[0]['img'];
	}
}


$karya_object->closeconnection();	

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
<!--<script src="assets/ckeditor/ckeditor.js"></script>-->

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
						<li><i class="fa fa-home"></i><a href="manufacture_list.php">Slider List</a></li>
						<li><i class="fa fa-laptop"></i>Add/Edit Slider</li>
					</ol>
				</div>
			</div>
			
			
			
		<div class="row">
			
				 <div class="col-md-12 portlets">
              <div class="panel panel-default">
                <div class="panel-Name">
                  <div class="pull-left">Add/Edit slider</div>
							
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
						<div class="form-group">
								<label class="control-label col-lg-10" for="id">ID</label>
								<input type="text" class="form-control" name="id" id="id" readonly value="<?php echo $id; ?>">
						
						</div>
					</div>
					<div class="form quick-post">
						<div class="form-group">
								<label class="control-label col-lg-10" for="id">Document Type</label>
								<input type="text" class="form-control" name="id" id="id" readonly value="<?php echo $documenttype; ?>">
						
						</div>
					</div>
					<div class="form quick-post">
						<div class="form-group">
								<label class="control-label col-lg-10" for="id">Pan Number</label>
								<input type="text" class="form-control" name="id" id="id" readonly value="<?php echo $pannumber; ?>">
						
						</div>
					</div>
					<div class="form quick-post">
						<div class="form-group">
								<label class="control-label col-lg-10" for="id">Gst Number</label>
								<input type="text" class="form-control" name="id" id="id" readonly value="<?php echo $gstnumber; ?>">
						
						</div>
					</div>
					<div class="form quick-post">
						<div class="form-group">
								<label class="control-label col-lg-1" for="id">ID</label>
								<img style="width:200px; height:auto; margin:10px;" src="upload1/<?php echo $attachment;?>">
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

  <?php include('footer.php'); ?>
  </body>
</html>
			
			