<?php

include("sessioncheck.php");
include("header.php");
include("configure_orders.php");
include("../admin/configure_finalproduct.php");
$kraya_orders = new Orders(); 
$kraya_finalproduct = new FinalProducts();
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
                    <h1 class="mb-0 bread">Purchase History</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-lg-12 order-md-last">
                    <div class="row">
                        <?php
                        $row = $kraya_orders->getOrders($userid);
                        if ($row == false){
                            $count = 0;
                        }
                        else{
                            $count = count($row);
                        }
                        for ( $i = 0 ; $i < $count; $i++){
                           $orderlist =  $kraya_finalproduct->getProducts1($row[$i]['product_id']);
                           if ($orderlist == false ){
                               $orderlistcount = 0;
                           }
                           else{
                               $orderlistcount = count($orderlist);
                           }
                           for($j = 0; $j <  $orderlistcount ; $j++){
                               
                            $im="../admin/upload1/".$orderlist[$j]['img'];
                           

                        
                        ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                            <div class="product">
                                <a href="orderdetails.php?id=<?php echo $row[$i]['id'] ?>" class="img-prod"><img class="img-fluid" src="<?php echo $im; ?>" alt="<?php echo $orderlist[$j]['name'] ?>">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 px-3">
                                    <h3><a href="#"></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="price-sale"><?php echo $orderlist[$j]['name']; ?></span></p>
                                            <p class="price"><span class="price-sale"><?php echo $orderlist[$j]['price']; ?></span></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php
                           }
                        }
                        ?>
                        
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php
  include("footer.php");
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