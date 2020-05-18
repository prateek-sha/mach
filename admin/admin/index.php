<?php ob_start(); ?>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inquiry Management System">        
    <link rel="shortcut icon" href="img/favicon.png">

    <title>E-Commerce</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" action="login.php" method="post">        
        <div class="login-wrap">
            <p class="login-img" style="background-image: url(img/logo.jpeg);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    height: 125px;"><i class="icon_lock_alt"></i></p>
			<?php
				
				if(!empty($_SESSION['error']))
				{
					echo "<p style='color:red;'>". $_SESSION['error']. "</p>";
					$_SESSION['error']='';
				}	
			?>
			<p><center>Admin PANEL</center></p>
			<div class="input-group">
				<span class="input-group-addon"><i class="icon_profile"></i></span>
				<input name="username" type="text" class="form-control" placeholder="Username" autofocus>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="icon_key_alt"></i></span>
				<input name="password" type="password" class="form-control" placeholder="Password">
			</div>
		
			<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>            					
<p><center>Copyright @ 2017 E-Commerce <br>Designed By - <a href="http://www.kirnanitechnologies.in"  target="_blank">Kirnani Technologies</a></p>
		</div>
	</form>

	</div>
  </body>
</html>
<?php ob_flush(); ?>