<?php
ob_start();

  include('sessioncheck.php');
  require('header.php');

  include('configure_checkout.php');
  include('../admin/configure_findmanu.php');
  include('../admin/configure_finalproduct.php');
  include("configure_review.php");
  include('../admin/configure_weight.php');
  $obj_weight= new weight();
  $kraya_review = new Review();
  $kraya_finalproduct = new FinalProducts();
  $kraya_checkout = new Checkout();
  $kraya_findmanu = new Findmanu();
  $final = array();
  $sum = 0;
  $ord = array();

  if(isset($_GET["action"]))
  {
    if($_GET["action"] == "checkout")
      {
  	    if ($_SERVER['REQUEST_METHOD']=='POST') 
  		  {
            if(!empty($_SESSION["shopping_cart"])){
                $o = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {   
                $finalproductlist = $kraya_finalproduct->getProducts1($values["item_id"]);
                if($finalproductlist == false){
                    echo "error1";
                    $finalproductlistcount = -1;
                }
                else{
                    $finalproductlistcount = count($finalproductlist);
                }
                for($i = 0; $i < $finalproductlistcount; $i++)
                {
                    $findmanu = $kraya_findmanu->getManuWithPara($finalproductlist[0]["product_para"], $values["item_quantity"] );
                    if($findmanu == false){
                        echo "error2";
                        $findmanucount = -1;
                    }
                    else{
                        $findmanucount = count($findmanu);
                    }
                    for($j=0 ; $j<$findmanucount; $j++)
                    {
                        $finereview = $kraya_findmanu->getReviewWithPara($finalproductlist[0]['product_para'], $findmanu[$j]['manu_id']);
                        if($finereview == false){
                            $finereviewcount = 0;
                        }
                        else{
                            $finereviewcount = count($finereview);
                        }
                        //echo $finereviewcount;
                        //exit();
                        $reviewtotal = 5;
                        if ( $finereviewcount > 1 ){
                            $kraya_review->manu_id = $findmanu[$j]['manu_id'];
                            $kraya_review->product_para = $finalproductlist[0]['product_para'];
                            $reviewtotal = $kraya_review->getAverage();
                           // echo "inside";
                           // echo $reviewtotal;
                        }
                        if($sum < $reviewtotal + $findmanu[$j]['quantity'] ){
                            $id = $findmanu[$j]['manu_id'];
                            $sum = $reviewtotal + $findmanu[$j]['quantity'];
                        }
                    }
                    $final[$id] = $sum;
                    $sum = 0;
                }
                    //print_r($final);
                    //adding oder ;-; 
                    $perorder = 0;
                    $dateslist = $kraya_findmanu->getRecordForDate($id,$finalproductlist[0]["product_para"]);
                    if($dateslist == false){
                        $dateslistcount = -1;
                    }
                    else{
                        $dateslistcount = count($dateslist);
                    }
                    for($d = 0; $d < $dateslistcount; $d++){
                        
                        $dayslist = $kraya_findmanu->checkdate($dateslist[$d]['addeddate'],date("Y-m-d H:i:s"));
                        if ($dayslist < 1){
                            $perorder = $perorder + 1;
                        }
                    }
                    
                    $kraya_checkout->firstname=$_POST['firstname'];
					$kraya_checkout->lastname=$_POST['lastname'];
					$kraya_checkout->country=$_POST['country'];
					$kraya_checkout->street=$_POST['street'];
					$kraya_checkout->street1=$_POST['street1'];
					$kraya_checkout->zipcode=$_POST['zipcode'];
					$kraya_checkout->city=$_POST['city'];
					$kraya_checkout->phonenumber=$_POST['phonenumber'];
					$kraya_checkout->email=$_POST['email'];
					$kraya_checkout->addeddate=date("Y-m-d H:i:s");
                    $kraya_checkout->product_para=$finalproductlist[0]["product_para"];
                    $kraya_checkout->product_id = $values["item_id"];
                    $kraya_checkout->manu_id=$id;
                    $kraya_checkout->user_id= $userid;
                    $dattee = "MEC".date("Y-m-d")."-".$values['item_id']."-".$id."-".$perorder;
                    $kraya_checkout->ordernum=$dattee;
                    $kraya_checkout->productprice=$values["item_price"];
                    $kraya_checkout->productname=$values["item_name"];
                    $kraya_checkout->productquantity=$values["item_quantity"];
                    if ($kraya_checkout->addRecord()){
                        $ord[$o] = $dattee;
                        $o = $o + 1;
                    }
                    else{
                        
                        $_SESSION["is_valid"] = 'false';
                    }
            
            
            }
            $_SESSION['is_valid'] = 'true';
            $_SESSION['order'] = implode("T",$ord);
            header("location: finalcheckout.php");
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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 ftco-animate">
                    <form  method="POST" action="checkout.php?action=checkout" class="billing-form">
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Firt Name</label>
                                    <input type="text" class="form-control" name="firstname" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">State / Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Street Address</label>
                                    <input type="text" class="form-control" name="street" placeholder="House number and street name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="street1" placeholder="Appartment, suite, unit etc: (optional)">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Town / City</label>
                                    <input type="text" class="form-control" name="city" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input type="text" class="form-control" name="zipcode" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phonenumber" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input type="text" class="form-control" name="email" placeholder="">
                                </div>
                            </div>
                        </div>
            
                    <!-- END -->
                    <?php
                                            //calculating value for total
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                                $all = 0;
                                $dev = 0;
                                foreach($_SESSION["shopping_cart"] as $keys => $values)
                                {
                                    $all += ($values["item_quantity"] * $values["item_price"] ); 
                                    $dev +=( $values['item_quantity'] * $kraya_finalproduct->getWeight1($values['item_id']));
                                }
                                $dil = $obj_weight->getPrice($dev);
                                $gst = $all*.12;   
                                $totall = ( $all + $dil + $gst );   
                        }

                        
                    ?>
                    <div class=" row justify-content-center">
                        <div class="col-md-6 d-flex">
                            <div class="cart-detail cart-total bg-light p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
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
                                <button class="btn btn-primary py-3 px-4" type="submit" > Place your order</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- .col-md-8 -->
            </div>
        </div>
    </section>
    <!-- .section -->

<?php
  require('footer.php');
?>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

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