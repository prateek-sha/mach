<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
    <title>WEBSITE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="goto-here">
    <div class="py-1 bg-black">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">7597690537</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text">WEBSITE@email.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">Featured information here &amp;like Free Returns, etc</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand mobile-img" href="index.php">
                <img src="./images/Mechanical-Bazaar.png" style="height: 50%;width: 20%;" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a id="myBtn" href="#" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
        <!-- The Modal -->
        <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="d-flex d-md-flex justify-content-center justify-content-md-center">
            <div style="margin-top: 15%;background-color: black;" class="modal-content mobileLoginPopup desktopLoginPopup">
                <span class="close">&times;</span>
                <div class="d-flex d-md-flex justify-content-center justify-content-md-center">
                    <div>
                        <div>
                            <h2 class="text-center d-flex justify-content-center" style="color: #fff;">Please select a login type</h2>
                        </div>
                        <div class="d-flex d-md-flex justify-content-center justify-content-md-center">
                            <?php
                        if(!isset($_SESSION['email']) )
                                        {?>
	<button type="button" style="margin: 10px; background-color: black;color: #fff;"> <a href="user-login.php" style="color: #fff;">
                           Login/Sign up as User</a> </button>
                                                       <?php }
                                                       else{
                                                        ?>
                            <button type="button" style="margin: 10px; background-color: black;color: #fff;"> <a href="logout.php" style="color: #fff;">
                            Logout</a> </button>
                            <?php
                                                       }
                                                       ?>
                            <button type="button" style="margin: 10px;background-color: black;color: #fff;"> <a href="login-manufacture.php" style="color: #fff;">
                            Login/Sign up As Manufacture
                        </a></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- end of model -->