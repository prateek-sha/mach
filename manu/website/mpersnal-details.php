<!DOCTYPE html>
<html lang="en">
<?php
  ob_start();
session_start();
if(!isset($_SESSION['email']))
{
	header('Location: index.php');
	exit();
}

require('headerlogin.php');
require('../admin/configure_manu.php');
require('../admin/configure_manudetails.php');
//include("../admin/image_single.php");
$Manufacture_object = new Manufacture();
$Manufacturedetail_object = new manufacturedetails();
$email = $_SESSION['email'];
$row = $Manufacture_object->getRecordById($email);
if ($row == FALSE){
    echo "error refresh";
}
$manuid = $row[0]['id'];

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if($_FILES['file1']['name'] == "")
    {
        $_SESSION['msg'] = "Image file is required. Please attach a file and try again to insert crop";
        echo "error";
        exit();
    }
    else
    {
        include("../admin/image_single.php");
    }
    $Manufacturedetail_object->manuid=$manuid;
    $Manufacturedetail_object->documenttype=$_POST['type'];
    $Manufacturedetail_object->pannumber=$_POST['pannumber'];
    $Manufacturedetail_object->gstnumber=$_POST['gstnumber'];
    $Manufacturedetail_object->img=$attachment;
    if($Manufacturedetail_object->addRecord()){
        header('Location: index.php');
	    exit();
    }

}
ob_flush();   
?>

    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
                <span class="login100-form-title p-b-37">
				Please fill these Details
				</span>

                <div class="form-check form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="type" id="" value="iso9001:2008"> ISO 9001:2008
                      </label>
                        <label class="form-check-label" style="margin-left: 20px;">
                        <input class="form-check-input" type="radio" name="type" id="" value="iso9001:2015"> ISO 9001:2015
                    </label>
                    </div>
                <div class="wrap-input100 m-b-25">
                    <div>
                        <p>Please Upload the Document for verification</p>
                    </div>
</div>
                    <div class="wrap-input100 m-b-25">
                    <input type="file" class="form-control" name="file1" id="file1" >
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter PAN NUMBER">
                    <input class="input100" type="number" name="pannumber" placeholder="Enter PAN NUMBER">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter GST NUMBER">
                    <input class="input100" type="number" name="gstnumber" placeholder="Enter GST NUMBER">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
						Submit
					</button>
                </div>

            </form>


        </div>
    </div>



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


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    <!--===============================================================================================-->
    <script src="css/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="css/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="css/login/vendor/bootstrap/js/popper.js"></script>
    <!--===============================================================================================-->
    <script src="css/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="css/login/vendor/daterangepicker/moment.min.js"></script>
    <!--===============================================================================================-->
    <script src="css/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="css/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="css/login/js/main.js"></script>

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