<?php
  require('headerlogin.php');
?>


    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="../admin/signup.php">
                <span class="login100-form-title p-b-37">
				User Sign Up
				</span>

                <div class="wrap-input100 validate-input m-b-20" id="pass" data-validate="Username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input m-b-25" id="passConfirm" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" name="pass" placeholder="Password (confirm)">
                    <span class="focus-input100"></span>
                </div>
                
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Salutation">
                    <input class="input100" type="text" name="salutation" placeholder="Salutation">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Title">
                    <input class="input100" type="text" name="title" placeholder="Title">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter First Name">
                    <input class="input100" type="text" name="firstname" placeholder="First Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Last Name">
                    <input class="input100" type="text" name="lastname" placeholder="Last Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Company Name">
                    <input class="input100" type="text" name="companyname" placeholder="Company Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Street">
                    <input class="input100" type="text" name="street" placeholder="Street">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Postcode">
                    <input class="input100" type="number" name="postcode" placeholder="Postcode">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter City/Town">
                    <input class="input100" type="text" name="city" placeholder="City/Town">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Region">
                    <input class="input100" type="text" name="region" placeholder="Region">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Phone Number">
                    <input class="input100" type="number" name="phonenumber" placeholder="Phone Number">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Mobile Number">
                    <input class="input100" type="number" name="mobilenumber" placeholder="Mobile Number">
                    <span class="focus-input100"></span>
                </div>

                <!-- <div class="wrap-input100 validate-input m-b-20" data-validate="Enter FAX Number">
                    <input class="input100" type="text" name="username" placeholder="FAX Number">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Email">
                    <input class="input100" type="text" name="username" placeholder="FAX Email">
                    <span class="focus-input100"></span>
                </div> -->


                <div class="container-login100-form-btn">

<!--                     <button id="msignupbtn" onclick="location.href='otp-verification.html';" class="login100-form-btn">
						Sign Up
                    </button> -->
                    <button type="submit" name="submit" class="login100-form-btn">
                        Sign Up
                    </button>


                </div>



                <div class="text-center">
                    <a href="user-login.php" class="txt2 hov1" style="text-decoration: none;">
                        <span style="color: rgb(41, 41, 41);">Already have an account?</span> Sign In
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