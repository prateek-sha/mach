<?php
ob_start();
  include('sessioncheck.php');
  require('header.php');
  include('../admin/configure_category.php');
  include('../admin/configure_products.php');
  include('../admin/configure_finalproduct.php');
  include('../admin/configure_weight.php');
  $obj_prod=new FinalProducts();
  $product =new Products();
  $cat = new Category();
  $obj_weight = new Weight();
if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'   =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    }
    else
    {
      echo '<script>alert("Item Already Added")</script>';
    }
  }
  else
  {
    $item_array = array(
      'item_id'     =>  $_GET["id"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["item_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
}
ob_flush();
?>


    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <form method="post" action="cart.php?action=add&id<?php ?>">
						    	<?php
                  $all = 0;
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						$all = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
							$all += ($values["item_quantity"] * $values["item_price"] ); 
                            $obj_prod->id = $values["item_id"];
                            $row = $obj_prod->getRecordById1();
                                    if($row==false)
                                    {
                                        echo  "error fecting the product";
                                        header('location: allproduct_list.php');
                                    }


                                        $im="../admin/upload1/".$row[0]['img']; 


					?>
                                <tr class="text-center">
                                    <td id="removethis" class="product-remove"><a  href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span id="delete" class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <img class="img" src="<?php echo $im; ?>" >
                                    </td>

                                    <td class="product-name">
                                        <h3><?php echo $row[0]['name'] ?></h3>
                                        <p><strong>Details Selected</strong></p>
                                        <?php
                                        $product_para = $row[0]['product_para'];
                                        $cats = array();
                                        $cats = explode("T",$product_para);
                                        for ($i = 0 ; $i< count($cats); $i++){
                                            $pro = explode("S",$cats[$i]);      
                                        //$split = str_split($product_para, 2);
                                       // $count = count($split);
    
                                        //for($j = 0 ; $j < $count ; $j++){
                                          //  $i = 0;
                                            $catname = $cat->getCategory($pro[0]);
                                            $productname = $product->getProducts1($pro[1]);

                                        ?>
                                        <p> <strong><?php echo $catname[0]['name'] ?></strong> - <?php echo $productname[0]['name']; ?></p>
                                        <?php }   ?>
                                        <div class="btn-group">
                                        
                                            <button     class="dropdown-toggle btn btn-success" style="width: 200px;"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span style="color: #fff;">
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
                                    </td>

                                    <td class="price "><?php echo $row[0]['price'] ?></td>

                                    <td class="quantity ">
                                        <div class="input-group mb-3 ">
                                            <input type="text " readonly name="quantity " class="quantity form-control input-number " value="<?php echo $values["item_quantity"] ?> " min="1 " max="100 ">
                                        </div>
                                    </td>

                                    <td class="total "><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                                </tr>
                                <?php
						  }
					}
					?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate ">
                    <div class="cart-total mb-3 ">
                        <h3>Cart Totals</h3>
                        <p class="d-flex ">
                            <span>Subtotal</span>
                            <span><?php echo $all; ?></span>
                        </p>
                        <p class="d-flex ">
                            <span>GST</span>
                            <?php  
                                $gst = $all*.12;
                            ?>
                            <span><?php echo $gst?></span>
                        </p>
                        <p class="d-flex ">
                            <span>Delivery</span>
                            <?php
                            $dev = 0;
                            $dil = 0;
                            $gst = 0;
                            $totall = 0;
                            if (!empty($_SESSION['shopping_cart'])){

                            
                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                            {
                                $dev +=( $values['item_quantity'] * $obj_prod->getWeight1($values['item_id']));
                            }
                            $dil = $obj_weight->getPrice($dev);
                        }
                            ?>
                            <span><?php echo $dil;  ?></span>
                        </p>
                        <hr>
                        <p class="d-flex total-price ">
                            <span>Total</span>
                            <?php
                            $totall = ( $all + $dil + $gst );
                            ?>
                            <span><?php echo $totall;  ?></span>
                        </p>
                    </div>
                    <p class="text-center "><a href="checkout.php " class="btn btn-primary py-3 px-4 ">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
        </form>
    </section>
<?php
  require('footer.php');
?>


   

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn2");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script src="js/jquery.min.js "></script>
    <script src="js/jquery-migrate-3.0.1.min.js "></script>
    <script src="js/popper.min.js "></script>
    <script src="js/bootstrap.min.js "></script>
    <script src="js/jquery.easing.1.3.js "></script>
    <script src="js/jquery.waypoints.min.js "></script>
    <script src="js/jquery.stellar.min.js "></script>
    <script src="js/owl.carousel.min.js "></script>
    <script src="js/jquery.magnific-popup.min.js "></script>
    <script src="js/aos.js "></script>
    <script src="js/jquery.animateNumber.min.js "></script>
    <script src="js/bootstrap-datepicker.js "></script>
    <script src="js/scrollax.min.js "></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false "></script>
    <script src="js/google-map.js "></script>
    <script src="js/main.js "></script>

    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>

</body>

</html>