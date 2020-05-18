<?php
ob_start();
session_start();
require('header.php');
include ('../admin/configure_products.php');
include ('../admin/configure_category.php');
//require('sessioncheck.php');
  $cat=new category();
  $product = new Products();
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
                         $product_para = $_GET['product_para'];
                         $split = str_split($product_para, 2);
                         $count = count($split);

                         for($j = 0 ; $j < $count ; $j++){
                             $i = 0;
                             $catname = $cat->getCategory($split[$j][$i]);
                             $productname = $product->getProducts1($split[$j][$i + 1]);
                         
                     ?>
                    <div class="sidebar-box-2">
                        <h2 class="heading mb-4"><a><?php echo $catname[0]['name'] ?></a></h2>
                        <p class="mb-2"><?php echo  $productname[0]['name']; ?></p>
                      
                        <br>
                    </div>
                    <?php
                                    }
                            ?>
                </div>

            <div class="col-md-8 col-lg-10 order-md-last" id="txtHint">
              
                <?php 
include('../admin/configure_finalproduct.php');
include('../admin/configure_findmanu.php');
$obj_prod=new FinalProducts();
$kraya_findmanu = new Findmanu();
    $obj_prod->product_para=$_GET['product_para'];
    $id = $_GET['product_para'];
    $row = $obj_prod->getRecordById();
    if ($row==false) {
        $count=0;
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
                        echo "error23";
                    }
                ?>
               
                    
            
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
        var part = '';
        selectmenus.forEach(option => {
                part = part + option.options[option.selectedIndex].value; 
                
        });
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getdata.php?q=" + part, true);
        xmlhttp.send();
        console.log(part);
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