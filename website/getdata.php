<?php 
include('../admin/configure_finalproduct.php');
include('../admin/configure_findmanu.php');
$obj_prod=new FinalProducts();
$kraya_findmanu = new Findmanu();
if(!empty($_GET['q']))
{
	
    $obj_prod->product_para=$_GET['q'];
    $id = $_GET['q'];
    $row = $obj_prod->getRecordById();
    if ($row==false) {
        # code...
        $count=0;
        echo "str";

    }
    else
    {
        $count = count($row);
    }

	if ($count > 0) 
	{
        $im="../admin/upload1/".$row[0]['img'];
        ?>
            <div class="col-md-8 col-lg-10 order-md-last">
            <form method="POST" action="cart.php?action=add&id=<?php echo $row[0]['id'];?>">
                    <div class="row">
                        <div class="col-lg-6 mb-5 ">
                            <a href="images/menu-2.jpg" class="image-popup"><img src="<?php echo $im ?>" class="img-fluid" alt="Colorlib Template"></a>
                        </div>
                        <div class="col-lg-6 product-details pl-md-5 ">
                            <h3><?php echo $row[0]['name'] ?></h3>
                            <input type="hidden" name="hidden_name" value="<?php echo $row[0]['name']; ?>">
                            <div class="rating d-flex">
                                <p class="text-left mr-4">
                                    <a href="#" class="mr-2">5.0</a>
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                </p>
                                <p class="text-left mr-4">
                                    <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                                </p>
                                <p class="text-left">
                                    <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                                </p>
                            </div>
                            <p class="price"><span><?php echo $row[0]['price'] ?></span></p>
                            <input type="hidden" name="hidden_price" value="<?php echo $row[0]['price'];   ?>">
                            <div id="pricxxx">
                            <p type="button" style="color: #fff" class="collapsible btn btn-black py-1 px-5">
                                <span style="font-size: 30px;"> 
                                Check Price

                            </span>
                            </p>
                            <div class="content">
                                <p style="color: #000; font-size: medium;">
                                    120 + 80 (With GST) + 100 (Delivery charge) = Rs.380

                                </p>
                            </div>
                                </div>
                            <p><?php echo $row[0]['description']  ?>
                            </p>
                            <div class="row mt-4">
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	
                            <?php
                     if ($kraya_findmanu->getMaxQuant($id) == 0){

                     ?>
	             	<input type="number" id="quantity" name="quantity" class="form-control input-number" value="0" min="0" max="0">
                            <?php
                            }
                            else{

                                ?>
                    <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="<?php echo $kraya_findmanu->getMaxQuant($id) ?>">

                           <?php } ?>
	          	</div>
	          	<div class="w-100"></div>
          	</div>
                            
                            <p><input type="submit" name="add_to_cart" class="btn btn-black py-3 px-5" value="Add to Cart"></p>
                            <div class="btn-group">
                                <button type="button" style="color: #20a000; background-color: #20a000;" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <span style="color: #20a000;">
                                    Download CAD File
                                   </span>
                                </button>
                                <div class="dropdown-menu">
                                <?php 
                                $files_text = $row[0]['cadfile'];
									if($files_text!="")
									{
										$files_array = explode(',',substr($files_text,0,strlen($files_text)-1));
										$ctr=1;
										foreach($files_array as $tmp)
										{
											//$tmp1 = explode('____',$tmp);
                                            //echo $ctr . ". " ;
                                             $cad =  "../admin/upload/".$tmp;
                                            ?>
                                        
                                             <a class="dropdown-item" href="<?php echo $cad; ?>"><?php echo $tmp;?></a>
                                            <?php
                                            $ctr++;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
               
                        </div>
                    </div>
                    </form>
                </div>
       

        <?php
	}
	else
	{
		echo "error";
	}



}
else{
    echo "error";
}
?>