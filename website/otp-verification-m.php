<?php
  ob_start();
  @session_start();
  require('headerlogin.php');
  require('../admin/textlocal.class.php');
  require('../admin/credential.php');
  require('../admin/configure_manu.php');
  $user_object = new Manufacture();
  if (isset($_GET['phn']) && isset($_GET['uname']) ){
    
    $numbers = array($_GET['phn']);
    $uname = $_GET['uname'];
    $textlocal = new Textlocal(false, false, API_KEY);
    //company sender name
    $sender = 'TXTLCL';
    $otp = mt_rand(10000, 99999);
    //message body 
    $message = "Hello " . $uname . " This is your OTP: " . $otp;
    try {
        $result = $textlocal->sendSms($numbers, $message, $sender);
        setcookie('otp', $otp);
       
     } 
    catch (Exception $e) 
        {
         echo "redirect...";
         die('Error: ' . $e->getMessage());
        }

    }
    if($_SERVER['REQUEST_METHOD']=='POST')
    { 
       
        echo $_POST['email'];
        $user_object->email = $_POST['email'];
        $otp = $_POST['otp'];
        if($_COOKIE['otp'] == $otp) {
            if ($user_object->otpverified()){
                echo "Congratulation, Your mobile is verified.";
                $_SESSION['email'] = $user_object->email;
			    header('Location: mpersnal-details.php');
            }
            
        } else {
            echo "Please Enter Correct OTP";
        }
    }
    ob_flush();    


?>

    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span class="login100-form-title p-b-37">
				Please Verify the OTP
				</span>


                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter OTP">
                    <input class="input100" type="number" name="otp" placeholder="Enter OTP Code">
                    <span class="focus-input100"></span>
                </div>

                <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>">
                <div class="container-login100-form-btn">

                    <button type="submit" class="login100-form-btn">
						Submit OTP
                    </button>
                </div>

                <div class="text-center">
                    <a href="#" class="txt2 hov1" style="text-decoration: none;">
                        <span style="color: rgb(41, 41, 41);">Didn't recieve OTP, Resend
                    </a>
                </div>
            </form>


        </div>
    </div>


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