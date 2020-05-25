
<?php  
ob_start();
    include('sessioncheck.php');
    include('header.php');
    include('../admin/configure_finalproduct.php');
    include('../admin/configure_weight.php');
    $kraya_finalproduct = new FinalProducts();
    $obj_weight = new Weight();


  $all = $dil =$dev= $gst=  $totall = 0 ;
    if(!empty($_SESSION["is_valid"])){
        if ($_SESSION['is_valid'] == 'false'){
            header("location: cart.php");
        }
    }
    else{
        header("location: cart.php");
    }
    // if($_SESSION["is_valid"] == 'false') {
    //     header("location: cart.php");
    // }
    if(!empty($_SESSION["shopping_cart"]))
    {
            
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                $all += ($values["item_quantity"] * $values["item_price"] ); 
                $dev +=( $values['item_quantity'] * $kraya_finalproduct->getWeight1($values['item_id']));
            }
            $dil = $obj_weight->getPrice($dev);
            $gst = $all*.12;   
            $totall = ( $all + $dil + $gst );   
    }

//echo $_SESSION['order'];
//unset($_SESSION['order']);
ob_flush();
?>

<div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 ftco-animate">

 <div class="row mb-5 mt-5 pt-3 d-flex justify-content-center">
                <div class="col-md-6 d-flex ">
                    <div class="cart-detail cart-total bg-light p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Payment method - Paytm</h3>
                            <form method="POST" action="PaytmKit/pgRedirect.php">
                                <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
                                        name="ORDER_ID" autocomplete="off"
                                        value="<?php echo $_SESSION['order']; ?>">

                                <input type="hidden" id="CUST_ID" tabindex="1" maxlength="20" size="20"
                                        name="CUST_ID" autocomplete="off"
                                        value="<?php echo  "CUST" . rand(10000,99999999)?>">   

                                <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" 
                                    name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">

                                <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
                                        size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">

                                <input title="TXN_AMOUNT" tabindex="10" type="hidden" 
                                        name="TXN_AMOUNT" value="<?php echo $totall; ?>">

                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span><?php echo $all; ?></span> 
                                </p>
                                <p class="d-flex">
                                    <span>GST</span>
                                    <span><?php echo $gst; ?></span>
                                </p>
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span><?php echo $dil; ?></span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                 <span><?php echo $totall; ?></span>
                                </p>
                                <!-- <p><a href="checkout.php?action=checkout"class="btn btn-primary py-3 px-4">Place an order</a></p> -->
                                <button class="btn btn-primary py-3 px-4" type="submit" >Pay now</button>
                            </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

  <?php
    include('footer.php');
    ?>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>