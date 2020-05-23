<?php
include 'sessioncheck.php';
include 'header.php';

$email="";
$password="";

if($_SERVER['REQUEST_METHOD']=="POST")
{		
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$stream_object = new Manufacture();
	$stream_object->email=$_POST['email'];
	$stream_object->password=$_POST['password'];

	$result = $stream_object->updatePassword();

	$stream_object->closeconnection();

	if($result==true)
	{													
		$_SESSION['msg']="Manufacture Password Updated Successfully.";			
	}
	else
	{
		$_SESSION['msg']="Error while Updating Password. Please Try Again.";	
		
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
			
				 <div class="col-md-12 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Change Password</div>
							
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
						  <form class="form-horizontal"  method="POST" >
							  <!-- Title -->
							  <div class="form-group">
								<label class="control-label col-lg-2" for="username">Email</label>
								<div class="col-lg-10"> 
								  <input type="text" class="form-control" name="email" id="email" readonly value="<?php echo $sessionemail; ?>">
								</div>
							  </div>
								
								
							  <div class="form-group">
								<label class="control-label col-lg-2" for="password">Password</label>
								<div class="col-lg-10"> 
								<input type="password" class="form-control" name="password" id="password" >
								</div>
							  </div>
							  
					  	
								
							  <!-- Buttons -->
							  <div class="form-group">
								 <!-- Buttons -->
								 <div class="col-lg-offset-2 col-lg-9">
									<button type="submit" class="btn btn-primary">Change Password</button>												
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
			
	