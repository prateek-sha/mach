<?php
  include("sessioncheck.php");
  include("header.php");
  include("configure_orders.php");
  include("../admin/configure_finalproduct.php");
  $karya_finalproduct = new FinalProducts();
  $karya_order = new Orders();
  $karya_order->id = $_GET['id'];
  $row = $karya_order->getCategoryData($userid);
  if ($row == false){
      echo "error fetching record";
      header("location: orderhistory.php");
      exit();
  }
  $productdetails = $karya_finalproduct->getProducts1($row[0]['product_id']);
  if ($productdetails == false ){
      echo "error fetching product.Please contact adminstartor";
      header("location: orderhistory.php");
      exit();
  }
  $im="../admin/upload1/".$productdetails[0]['img'];
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.php">Product</a></span> <span>Product Single</span></p>
                    <h1 class="mb-0 bread">Product Single detail</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">
                        <div class="col-lg-6 mb-5 ftco-animate">
                            <a href="images/menu-2.jpg" class="image-popup"><img src="<?php echo $im; ?>" class="img-fluid" alt="Colorlib Template"></a>
                        </div>
                        <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                            <h3><?php echo $row[0]['productname']?> </h3>
                            <p>Please wait your product is in process</p>
                            <div>
                                <h5>
                                    Review your product Quality
                                </h5>
                                <div class="rating d-flex">
                                    <p class="text-left mr-4">
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=1&type=product"><span class="ion-ios-star-outline"></span></a>
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=2&type=product"><span class="ion-ios-star-outline"></span></a>
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=3&type=product"><span class="ion-ios-star-outline"></span></a>
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=4&type=product"><span class="ion-ios-star-outline"></span></a>
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=5&type=product"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                                <h5>
                                    Review your product shiping
                                </h5>
                                <div class="rating d-flex">
                                    <p class="text-left mr-4">
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=1&type=shipping"><span class="ion-ios-star-outline"></span></a>
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=2&type=shipping"><span class="ion-ios-star-outline"></span></a>
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=3&type=shipping"><span class="ion-ios-star-outline"></span></a>
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=4&type=shipping"><span class="ion-ios-star-outline"></span></a>
                                        <a href="productquality.php?id=<?php echo $_GET['id']?>&star=5&type=shipping"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class=""><span>Price - <?php echo $row[0]['productprice'] ?></span></p>
                            <p class=""><span>Quantity - <?php echo $row[0]['productquantity']; ?></span></p>
                            <p class=""><span>Order Placed On - <?php echo $row[0]['addeddate']; ?></span></p>
                            <p class=""><span>Order Numuber - <?php echo $row[0]['ordernum']; ?></span></p>
                            <?php 
                              if ( $row[0]['dispacted'] == 0){
                                  ?>
                              
                            <p class="price"><span>Dispatch - NO</span></p>
                            <?php
                            }
                            else{

                            ?>
                            <p class="price"><span>Dispatch - Yes</span></p>
                            <?php
                            }
                            ?>
                        </div>
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
    <script src="./js/jqselector.js"></script>
    <script src="js/main.js"></script>

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