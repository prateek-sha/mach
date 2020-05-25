<?php
include 'sessioncheck.php';
include 'header.php';
include ('configure_manu.php');
include ('configure_manudetails.php');
include ('configure_order.php');
include ("../website/configure_review.php");

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
						<li><i class="fa fa-home"></i><a href="review_list.php">Review List</a></li>								</ol>
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
						    <th><i class="icon_profile"></i> ID</th>
							<th><i class="icon_profile"></i> Manufacture Name</th>
							<th><i class="icon_profile"></i> Manufacture ID</th>
							<th><i class="icon_profile"></i> Product Name</th>
							<th><i class="icon_profile"></i> Review Average </th>	
						</tr>
					</thead>   

					<tbody>
                        <?php	
                        $kraya_order = new Order();	
                        $inbox_object = new Manufacture();
                        $kraya_review = new Review();
                        $orderlist = $kraya_order->getData();
                    	
                        if ($orderlist == false){
                            echo "error fetching data";
                            $orderlistcount = 0;
                        }			
                        else{
                            $orderlistcount = count($orderlist);
                        }
                        for($i = 0; $i < $orderlistcount ; $i++){
                            $kraya_review->manu_id = $orderlist[$i]['manu_id'];
                            $kraya_review->product_para = $orderlist[$i]["product_para"];
                            $data = $inbox_object->getRecordById1($orderlist[$i]['manu_id']);
							?>
							<tr>
							    <td><?php echo $orderlist[$i]['id']; ?></td>
								<td><?php echo $data[0]['firstname']; ?></td>
								<td><?php echo $data[0]['id']; ?></td>
								<td><?php echo $orderlist[$i]['productname']; ?></td>
								<td><?php echo $kraya_review->getAverage(); ?></td>
							</tr>
							<?php		
							
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
    <!-- custome script for all page -->
    <script src="js/scripts.js"></script>
	
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>

            $(document).ready(function () {
                $('#dataTables-example').dataTable(
                	{
                		"order": [[ 0, "desc" ]],
                		 "pageLength": 50,
		
                	});
            });

function deleterecord(id)
{
var res = confirm("Are you Sure ? \n Do you want to delete Record : " + id );

if(res==true)
{
window.location="delete_slider.php?id="+id;
}
}
    </script>

	<?php include('footer.php'); ?>
  </body>
</html>