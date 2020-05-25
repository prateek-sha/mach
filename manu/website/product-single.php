<?php
ob_start();
session_start();

  require('header.php');
  include ('../admin/configure_products.php');
include ('../admin/configure_category.php');
//require('sessioncheck.php');
  $cat=new category();
  $karya_object = new Products();
  $categoryname="";
ob_flush();
?>


    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Product Single</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
               

                <div class="col-md-4 col-lg-2 sidebar">
                <?php

                          $row = $cat->getData();
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
                    <div class="sidebar-box-2">
                       
                        <h2 class="heading mb-4"><a><?php echo $row[$i]['name'] ?></a></h2>
                        <select class="form-control" id="part" name="">
                        <?php    
                        $product = $karya_object->getProducts($row[$i]['id']);
                            if($product==false)
                            {
                                $productcount=0;
                            }
                            else
                            {						
                                $productcount=count($product);
                            }
                            $j=0;
                            while($j<$productcount)
                            {
                        ?>        
                            <option value="<?php echo $row[$i]['id'];echo "S";echo$product[$j]['id'] ?>" ><?php  echo $product[$j]['name'] ?></option>
                            <?php $j++;} ?>
                            </select>

<br>
                       
                    </div>
                    <?php $i++;} ?>

                    <button class="btn btn-warning" id="btnn" style="color: #fff;">
                        Find Product
                    </button>
                    
                </div>

                <div class="col-md-8 col-lg-10 order-md-last" id="txtHint">
                </div>

               
                    
            

            </div>
        </div>


    </section>
    <section class="ftco-section">

       

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


    <script>
        //code for select parameter
        var buttoun = document.getElementById("btnn");
        buttoun.onclick = function(){
        var selectmenus = document.querySelectorAll('#part');
        var part = new Array();
        var i = 0;
        selectmenus.forEach(option => {
                part[i] = option.options[option.selectedIndex].value;
                i = i +1; 
        });
        var partt = part.join("T");
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getdata.php?q=" + partt, true);
        xmlhttp.send();
        //console.log(partt);
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
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;
        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>