<?php
include 'sessioncheck.php';
include 'header.php';
include ('configure_order.php');
include ('configure_manu.php');
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
						<li><i class="fa fa-home"></i><a href="order_list.php">Order List</a></li>								
						<li><input type="number"   onkeyup="showHint(this.value)"  min="0" placeholder="Enter Date Here"></li>
					</ol>
				</div>
			</div>
			
			
              <!-- project team & activity end -->
			  
		<div class="row" >
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
							<th><i class="icon_profile"></i> Product Name</th>
							<th><i class="icon_profile"></i> Product Price</th>
							<th><i class="icon_profile"></i> Product Quantity</th>
							<th><i class="icon_profile"></i> ManuFacture Name</th>
							<th><i class="icon_profile"></i> ManuFacture Email</th>
							<th><i class="icon_profile"></i> Customer First Name</th>
							<th><i class="icon_profile"></i> Customer Last Name</th>
							<th><i class="icon_profile"></i> Customer Street</th>
							<th><i class="icon_profile"></i> Customer Street2</th>
							<th><i class="icon_profile"></i> Customer Phone Number</th>
							<th><i class="icon_profile"></i> Addeddate</th>
							<th><i class="icon_profile"></i> Dispascted</th>
							<th><i class="icon_profile"></i> PDF</th>
						</tr>
					</thead>   

					<tbody id="txtHint">
						<?php						
                        $inbox_object = new Order();
                        $krya_manu = new Manufacture();
						$row = $inbox_object->getData();
						
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
							<tr>
								<td><?php echo $row[$i]['id']; ?></td>
								<td><?php echo $row[$i]['productname']; ?></td>
								<td><?php echo $row[$i]['productprice']; ?></td>
								<td><?php echo $row[$i]['productquantity']; ?></td>
								<td><?php echo $krya_manu->getRecordById1($row[$i]['manu_id'])[0]['firstname']; ?> </td>
                                <td><?php echo $krya_manu->getRecordById1($row[$i]['manu_id'])[0]['email']; ?> </td>
								<td><?php echo $row[$i]['firstname']; ?></td>
								<td><?php echo $row[$i]['lastname']; ?></td>
								<td><?php echo $row[$i]['street']; ?></td>
								<td><?php echo $row[$i]['street1']; ?></td>
								<td><?php echo $row[$i]['phonenumber']; ?></td>
								<td><?php echo $row[$i]['addeddate']; ?></td>
								
								<td>

								<?php 
								if($row[$i]['dispacted']==1)
								{
									echo "<a href='category_dispacted_status_change.php?id=".$row[$i]['id']."&status=0' >ON</a>";
								}
								else
								{
									echo "<a href='category_dispacted_status_change.php?id=".$row[$i]['id']."&status=1' >OFF</a>";
								}
								?>
								</td>

                   
								<td>

                                <?php 
								if($row[$i]['pdf'] == "hello")
								{
                                   echo " <a type='button' disabled class='btn btn-success' href=''>Download</a> ";

									//echo "<a href='category_dispacted_status_change.php?id=".$row[$i]['id']."&status=0' >ON</a>";
								}
								else
								{
									$cad =  "../admin/uploadpdf/".$row[$i]['pdf'];

                                    echo " <a class='btn btn-success' href='".$cad."'>Download</a> ";
								}
								?>
								</td>

								
							</tr>
							<?php		
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
window.location="delete_category.php?id="+id;
}
}
    </script>
    <script>
    function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getOrders.php?q=" + str, true);
        xmlhttp.send();
    }
}



    </script>
	<?php include('footer.php'); ?>
  </body>
</html>
			
			