<?php
date_default_timezone_set("Asia/Kolkata");

include('sessioncheck.php');
include ('../admin/configure_products.php');
require_once ('../admin/configure_manu.php');
include ('../admin/configure_category.php');
include ('../admin/configure_finalproduct.php');
include ('configure_myproduct.php');
$allproduct=new FinalProducts();
$product =new Products();
$cat = new Category();
$manu = new Manufacture();
$manu->email = $sessionemail;

if ($manu->EmailCheck()){
    $manuidrow = $manu->EmailCheck();
    $manuid = $manuidrow[0]['id'];
}
	
$id=$_GET['id'];

if($_SERVER['REQUEST_METHOD']=="POST")
{		
//Creating Object of Userrole Class
$karya_object = new MyProducts();
//Adding Data into Object
$karya_object->quantity = $_POST['quantity'];
$karya_object->manuid= $manuid;
$karya_object->product_para=$_POST['productpara'];
$karya_object->addeddate = date("Y-m-d H:i:s");


if($karya_object->checkrepeat()  == FALSE){

    //Calling add Function to add data into database
$karya_object->addRecord();			
$_SESSION['msg'] = "1 Product record added";

}
else{
    $updatedata = $karya_object->checkrepeat();
    $karya_object->id = $updatedata[0]['id'];
    $karya_object->updateRecord();
    $_SESSION['msg'] = "1 Product record updated ";	

			
}
//calling connection close function
$karya_object->closeconnection();	


header("Location: allproduct_list.php");
exit();
	
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
						<li><i class="fa fa-home"></i><a href="allproduct_list.php">Product List</a></li>
						<li><i class="fa fa-laptop"></i>Add/Edit Product</li>						  	
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
                                <?php
                                    $allproduct->id = $id;
                                    $row = $allproduct->getRecordById1();
                                    
                                    if($row==false)
                                    {
                                        echo  "error fecting the product";
                                        header('location: allproduct_list.php');
                                    }
                                    $product_para = $row[0]['product_para'];
                                    $cats = array();
                                    $cats = explode("T",$product_para);
                                    for ($i = 0 ; $i< count($cats); $i++){
                                        $pro = explode("S",$cats[$i]);                                  
                                    //$split = str_split($product_para, 2);
                                    //$count = count($split);

                                    //for($j = 0 ; $j < $count ; $j++){
                                        //$i = 0;
                                        $catname = $cat->getCategory($pro[0]);
                                        $productname = $product->getProducts1($pro[1]);
                                    
                                ?>
                                		  <div class="form-group">
								<label class="control-label col-lg-1" for="id"><?php echo $catname[0]['name'] ?></label>
								<div class="col-lg-10"> 
								  <input type="slot" class="form-control" name="id" id="id" readonly value="<?php echo $productname[0]['name']; ?>">
								</div>
							  </div>
                            

                            <?php
                                    }
                            ?>
								
                                <input type="hidden" name="productpara" value="<?php echo $row[0]['product_para'] ?> "> 
                                						<!-- Title -->
							  <div class="form-group col-lg-12">
								<label class="control-label col-lg-1" for="name">Quantity</label>
								<div class="col-lg-10"> 
								  <input type="number" class="form-control" name="quantity" id="quantity">
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
 


  </body>
</html>
			
			