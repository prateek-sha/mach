<?php
include 'sessioncheck.php';
include 'header.php';
include ('configure_manu.php');
include ('configure_manudetails.php');

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
							<th><i class="icon_profile"></i> FirstName</th>
							<th><i class="icon_profile"></i> LastName</th>
							<th><i class="icon_profile"></i> Email</th>	
							<th><i class="icon_profile"></i> title</th>	
							<th><i class="icon_profile"></i> Companyname</th>	
							<th><i class="icon_profile"></i> Salutation</th>		
							<th><i class="icon_profile"></i> Street</th>	
							<th><i class="icon_profile"></i> Postcode</th>
							<th><i class="icon_profile"></i> city</th>	
							<th><i class="icon_profile"></i> Region</th>
							<th><i class="icon_profile"></i> MobileNUmber</th>
							<th><i class="icon_profile"></i> Phonenumber</th>
							<th><i class="icon_profile"></i> FaxNumber</th>
							<th><i class="icon_profile"></i> Faxemail</th>
							<th><i class="icon_cogs"></i> Action</th>
						</tr>
					</thead>   

					<tbody>
						<?php						
						$inbox_object = new Manufacture();
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
								<td><?php echo $row[$i]['firstname']; ?></td>
								<td><?php echo $row[$i]['lastname']; ?></td>
								<td><?php echo $row[$i]['email']; ?></td>
								<td><?php echo $row[$i]['title']; ?></td>
								<td><?php echo $row[$i]['companyname']; ?></td>
								<td><?php echo $row[$i]['salutation']; ?></td>
								<td><?php echo $row[$i]['street']; ?></td>
								<td><?php echo $row[$i]['postcode']; ?></td>
								<td><?php echo $row[$i]['city']; ?></td>
								<td><?php echo $row[$i]['region']; ?></td>
								<td><?php echo $row[$i]['mobilenumber']; ?></td>
								<td><?php echo $row[$i]['phonenumber']; ?></td>
								<td><?php echo $row[$i]['faxnumber']; ?></td>
								<td><?php echo $row[$i]['faxemail']; ?></td>

								 <td>

								<?php
								if($row[$i]['emailverified']==1)
								{
									echo "<a href='slider_active_status_change.php?id=".$row[$i]['id']."&emailverified=0' >ON</a>";
								}
								else
								{
									echo "<a href='slider_active_status_change.php?id=".$row[$i]['id']."&emailverified=1' >OFF</a>";
								}
								?>
								</td>
								<td>
									<div class="btn-group">				
									<a class="btn btn-success" href="manufacture.php?id=<?php echo $row[$i]['id'];?>" >Show</a>
	
									</div>
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
window.location="delete_slider.php?id="+id;
}
}
    </script>

	<?php include('footer.php'); ?>
  </body>
</html>