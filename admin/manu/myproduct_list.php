
<?php
include 'sessioncheck.php';
include 'header.php';
require_once ("../admin/configure_manu.php");
include ('configure_myproduct.php');
include ('../admin/configure_finalproduct.php');

$manu = new Manufacture();
$manu->email = $sessionemail;

if ($manu->EmailCheck()){
    $manuidrow = $manu->EmailCheck();
    $manuid = $manuidrow[0]['id'];
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
    
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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
						<li><i class="fa fa-home"></i><a href="myproduct_list.php">All Products List</a></li>						
					</ol>
				</div>
			</div>
			
			
              <!-- project team & activity end -->
			  
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
					  Available Records
					  <?php				
					if(!empty($_SESSION['msg']))
					{
						echo "<span style='color:red;'>". $_SESSION['msg']. "</span>";
						$_SESSION['msg']='';
					}	
				?>
					</header>
                 
					<table class="table table-striped table-advance table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th><i class="icon_profile"></i> Name</th>
							<th><i class="icon_profile"></i> Description</th>
							<th><i class="icon_profile"></i> Addeddate</th>
							<th><i class="icon_profile"></i> Quantity</th>
							<th><i class="icon_cogs"></i> Action</th>
						</tr>
					</thead>   

					<tbody>
						<?php						
						$karya_object = new MyProducts();
						
						$row =$karya_object->getProducts($manuid);						
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
                            $karya_product= new FinalProducts();
                            $karya_product->product_para = $row[$i]['product_para'];
                            $row1 = $karya_product->getRecordById();

                            if($row1 == FALSE){
								//echo "error";
								$_SESSION['msg'] = "No product Found";
                                //header('location: myproduct_list.php');
							}
							else{
							?>
							<tr>
								<td><?php echo $row1[0]['name']; ?></td>
								<td><?php echo $row1[0]['description']; ?></td>						
								<td><?php echo $row[$i]['addeddate']; ?></td>						
								<td><?php echo $row[$i]['quantity']; ?></td>						
								<td>
									<div class="btn-group">				
									<a class="btn btn-success" href="allproduct.php?id=<?php echo $row1[$i]['id'];?>" >Edit</a>									
									</div>
								</td>
								
							</tr>
                            <?php	
							}
								$i++;
						}
			
						?>
                                                          
				   </tbody>
				</table>
			  </section>
		  </div>
	  </div>
	  
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
    
    
        
    <!-- custome script for all page -->
    <script src="js/scripts.js"></script>
	
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
       $(document).ready(function () {
                $('#dataTables-example').dataTable(
                	{
                		"order": [[ 0, "desc" ]],
                		 "pageLength": 50
                	});
            });
function deleterecord(id)
{
var res = confirm("Are you Sure ? \n Do you want to delete Record : " + id );

if(res==true)
{
window.location="delete_finalproduct.php?id="+id;
}
}


    </script>

	<?php include('footer.php'); ?>
  </body>
</html>
			
