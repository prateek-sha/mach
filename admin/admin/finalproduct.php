<?php
date_default_timezone_set("Asia/Kolkata");

include 'sessioncheck.php';
include 'header.php';
include ('configure_products.php');
include ('configure_finalproduct.php');
include ('configure_category.php');
$cat=new category();
$karya_product = new Products();

$name="";
$description="";
$attachment="";
$cadfile="";
$price="";
$product_para="";
$addeddate="";
$id=0;

if($_SERVER['REQUEST_METHOD']=="POST")
{		
$id=$_POST['id'];

if(isset($_POST['attachment']))
{
	$attachment=$_POST['attachment'];
		
	if($_FILES['file1']['name']!="")
	{
		include("image_single.php");
		
		$file = $_SERVER['DOCUMENT_ROOT'] . "/mech/admin/upload1/" . $_POST['attachment'];		
		if (!unlink($file))
		{
			echo ("Error deleting $file");
		}
	}
	
}



else
{
	if($_FILES['file1']['name']=="")
	{
		$_SESSION['msg'] = "Image file is required. Please attach a file and try again to insert crop";
		header("Location: finalproduct_list.php");
		exit();
	}
	else
	{
		include("image_single.php");
	}
}


if(isset($_POST['cadfile']))
{
	$cadfile=$_POST['cadfile'];
		
	if($_FILES['cadfile']['name']!="")
	{
		include("cad_file.php");
		
		$file = $_SERVER['DOCUMENT_ROOT'] . "/mech/admin/upload/" . $_POST['cadfile'];		
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
		header("Location: finalproduct_list.php");
		exit();
	}
	else
	{
		include("cad_file.php");
	}
}


//adding all parts variable into one
$product_paras = array();
$row = $cat->getData();
if($row==false)
{
    $count=0;
}
else
{						
    $count=count($row);
}
$i=0;
while($i<$count)
{
    $tempone = $row[$i]['id'];
    $temp = "part{$tempone}"; 
    $product_paras[$i] = $_POST[$temp];
    $i++;  
}



//Creating Object of Userrole Class
$karya_object = new FinalProducts();
//Adding Data into Object
$karya_object->product_para = implode("", $product_paras);
$karya_object->name = $_POST['name'];
$karya_object->description = $_POST['description'];
$karya_object->image = $attachment;
$karya_object->cadfile = $cadfile;
$karya_object->id=$_POST['id'];
$karya_object->price = $_POST['price'];
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
		$file = $_SERVER['DOCUMENT_ROOT'] . "/mech/admin/upload1/" . $js;		
		if (!unlink($file))
		{
			echo ("Error deleting $file");
		}		
	}	
}
//calling connection close function
$karya_object->closeconnection();	


header("Location: finalproduct_list.php");
exit();
	
}
else
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		
		$karya_object = new FinalProducts();
		
		//Adding Data into Object		
		$karya_object->id=$id;
		
		$row = $karya_object->getRecordById1();
		
		$count = count($row);

		if($count<1)
		{
			echo "Error in fetching record";
			exit();
		}
				
		$name = $row[0]['name'];
		$description = $row[0]['description'];			
		$attachment = $row[0]['img'];
		$cadfile = $row[0]['cadfile'];
		$price = $row[0]['price'];
		$minprice = $row[0]['price'];
		$addeddate = $row[0]['addeddate'];
		$product_para=$row[0]['product_para'];

	}
}

?>
<!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
    <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    
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
						<li><i class="fa fa-home"></i><a href="products_list.php">Product List</a></li>
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
						  <form class="form-horizontal" method="POST" enctype="multipart/form-data">
							  <!-- Title -->
							  <div class="form-group">
								<label class="control-label col-lg-1" for="id">ID</label>
								<div class="col-lg-10"> 
								  <input type="text" class="form-control" name="id" id="id" readonly value="<?php echo $id; ?>">
								</div>
							  </div>
                              
                              <?php
                                    $row = $cat->getData();
                                    if($row==false)
                                    {
                                        $count=0;
                                    }
                                    else
                                    {						
                                        $count=count($row);
                                    }
                                    $i=0;
                                    while($i<$count)
                                    {
                            
                        ?>
							<div class="form-group col-lg-12">	
							 <label class="control-label col-lg-1" for="categoryid"><?php echo $row[$i]['name'] ?></label>
							 <div class="col-lg-10"> 
							  <select name="part<?php echo $row[$i]['id'] ?>" class="form-control">
							  	<option value="0">Select Category Id</option>
                                  <?php    
                                $product = $karya_product->getProducts($row[$i]['id']);
                                    if($product==false)
                                    {
                                        $productcount=0;
                                    }
                                    else
                                    {						
                                        $productcount=count($product);
                                    }
                                    $j=0;
                                    while($j<$productcount)
                                    {
                                     ?>        
                            <option value="<?php echo $row[$i]['id']; echo$product[$j]['id'] ?>" > <?php  echo $product[$j]['name'] ?> </option>
                            <?php $j++;} ?>
							  </select>
                            </div>

                        
                            


                            </div>
                            <?php $i++; }  ?>
														<!-- Title -->
							  <div class="form-group col-lg-12">
								<label class="control-label col-lg-1" for="name">Name</label>
								<div class="col-lg-10"> 
								  <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
								</div>
							  </div>

							  <div class="form-group col-lg-12" >
								<label class="control-label col-lg-1" for="id">Description</label>
								<div class="col-lg-10"> 

								  <input type="text" class="form-control" name="description" id="description" value="<?php echo $description; ?>">
								</div>
							  </div>
								<div class="form-group">

								<label class="control-label col-lg-1" for="image">Image</label>
								<div class="col-lg-10"> 
								
								  <input type="file" class="form-control" name="file1" id="file1" >
								
								<?php 								
								if($id!=0)
								{
									?>
									<input type="hidden" name="attachment" id="attachment" value="<?php echo $attachment; ?>">
									<input type="hidden" class="form-control" name="cadfile" id="cadfile" value="<?php echo $cadfile; ?>">
									Attachment: <br>
									<div >
									<img style="width:200px; height:auto; margin:10px;" src="upload1/<?php echo $attachment;?>">
									</div> 
									<?php
									
								}
								  
							  ?>
								  
								  
								</div>
							  </div>
								
				
							  <div class="form-group col-lg-6">
								<label class="control-label col-lg-2" for="title">Price</label>
								<div class="col-lg-10"> 
								  <input type="text" class="form-control" name="price" id="price" value="<?php echo $price; ?>">
								</div>
							  </div>

							  <div class="form-group col-lg-6">
								<label class="control-label col-lg-2" for="title">Cad FIle</label>
								<div class="col-lg-10"> 
								  <input type="file" class="form-control" name="cadfile" id="cadfile" value="<?php echo $cadfile; ?>">
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
  <?php include('footer.php'); ?>
  </body>
</html>
			
			