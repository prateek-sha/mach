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
                            <p><?php echo $row[0]['description']  ?>
                            </p>
                            <div class="row mt-4">
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	
	             	<input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="<?php echo $kraya_findmanu->getMaxQuant($id) ?>">

	          	</div>
	          	<div class="w-100"></div>
          	</div>
                            <?php $cad =  "../admin/upload/".$row[0]['cadfile'] ?>
                            <p><input type="submit" name="add_to_cart" class="btn btn-black py-3 px-5" value="Add to Cart"></p>
                            <p><a href=" <?php echo $cad ?>" class="btn btn-success py-3 px-5">Download CAD File</a></p>

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