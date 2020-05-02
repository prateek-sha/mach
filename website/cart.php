<?php
  require('header.php');
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
                <div class="col-md-12 ftco-animate">
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
                                <tr class="text-center">
                                    <td id="removethis" class="product-remove"><a><span id="delete" class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image:url(images/pic3.jpg);"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3>Product_Name</h3>
                                        <p>Summery about the product</p>
                                        <p><strong>Details Selected</strong></p>
                                        <p>Thread - 1.5</p>
                                        <p>Diameter - 5mm</p>
                                        <p>Any parameter - it's value</p>
                                        <button class=" btn btn-success" style="width: 200px;">
                                         <span style="color: #fff; ">
                                            Download CAD File
                                         </span> 
                                        </button>
                                    </td>

                                    <td class="price ">$4.90</td>

                                    <td class="quantity ">
                                        <div class="input-group mb-3 ">
                                            <input type="text " name="quantity " class="quantity form-control input-number " value="1 " min="1 " max="100 ">
                                        </div>
                                    </td>

                                    <td class="total ">$4.90</td>
                                </tr>

                                <!-- END TR-->

                                <tr class="text-center ">
                                    <td class="product-remove "><a><span id="delete " class="ion-ios-close "></span></a></td>

                                    <td class="image-prod ">
                                        <div class="img " style="background-image:url(images/pic2.jpg); "></div>
                                    </td>

                                    <td class="product-name ">
                                        <h3>Product_Name</h3>
                                        <p>Summery about the product</p>
                                        <p><strong>Details Selected</strong></p>
                                        <p>Thread - 1.5</p>
                                        <p>Diameter - 5mm</p>
                                        <p>Any parameter - it's value</p>
                                    </td>

                                    <td class="price ">$4.90</td>

                                    <td class="quantity ">
                                        <div class="input-group mb-3 ">
                                            <input type="text " name="quantity " class="quantity form-control input-number " value="1 " min="1 " max="100 ">
                                        </div>
                                    </td>

                                    <td class="total ">$4.90</td>
                                </tr>
                                <!-- END TR-->
                                <!-- <tr class="text-center ">
                                    <td class="product-remove "><a href="# "><span class="ion-ios-close "></span></a></td>

                                    <td class="image-prod ">
                                        <div class="img " style="background-image:url(images/product-4.jpg); "></div>
                                    </td>

                                    <td class="product-name ">
                                        <h3>Young Woman Wearing Dress</h3>
                                        <p>Far far away, behind the word mountains, far from the countries</p>
                                    </td>

                                    <td class="price ">$15.70</td>

                                    <td class="quantity ">
                                        <div class="input-group mb-3 ">
                                            <input type="text " name="quantity " class="quantity form-control input-number " value="1 " min="1 " max="100 ">
                                        </div>
                                    </td>

                                    <td class="total ">$15.70</td>
                                </tr> -->
                                <!-- END TR-->
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
                            <span>$20.60</span>
                        </p>
                        <p class="d-flex ">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex ">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price ">
                            <span>Total</span>
                            <span>$17.60</span>
                        </p>
                    </div>
                    <p class="text-center "><a href="checkout.html " class="btn btn-primary py-3 px-4 ">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>
<?php
  require('footer.php');
?>


    <!-- loader -->
    <div id="ftco-loader " class="show fullscreen "><svg class="circular " width="48px " height="48px "><circle class="path-bg " cx="24 " cy="24 " r="22 " fill="none " stroke-width="4 " stroke="#eeeeee "/><circle class="path " cx="24 " cy="24 " r="22
                                            " fill="none " stroke-width="4 " stroke-miterlimit="10 " stroke="#F96D00 "/></svg></div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal ");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn ");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close ")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block ";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none ";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none ";
            }
        }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal ");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn2 ");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close ")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block ";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none ";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none ";
            }
        }
    </script>

    <script src="js/jquery.min.js "></script>
    <script src="js/my.js "></script>
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