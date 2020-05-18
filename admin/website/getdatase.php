<?php 
include('../admin/configure_finalproduct.php');
$obj_prod=new FinalProducts();
if(!empty($_GET['q']))
{
	$con=mysqli_connect('localhost','root','','mechanicalbazaar');
	$q=$_GET['q'];
	$query="select id from finalproduct where name like '%$q%' ";
	$res=mysqli_query($con,$query);
	$c=mysqli_num_rows($res);
	if ($c>0) 
	{
		
		while($row_de=mysqli_fetch_array($res))
		{
                $id=$row_de[0];
                $obj_prod->id = $id;
				$row=$obj_prod->getRecordById1();
				if ($row==false) {
					# code...
					$count=0;

				}
				else
				{
					$count =count($row);
				}
				for($i=0;$i<$count;$i++)   
                    {   
                           $im="../admin/upload1/".$row[$i]['img'];
                     ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 ">
                            <div class="product">
                                <a href="searchresult.php?id=<?php echo $row[$i]['id']?>&product_para=<?php echo $row[$i]['product_para'] ?>" class="img-prod"><img class="img-fluid" src="<?php echo $im; ?>" alt="Colorlib Template">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 px-3">
                                    <h3><?php echo $row[$i]['name'] ?></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="price-sale"><?php echo $row[$i]['price'] ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

			<?php } 

            
			

			
		}
	}
	else
	{
		echo "No Product Found";
	}



}
?>