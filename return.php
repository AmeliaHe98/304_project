<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Open+Sans:400,600,700|Oswald|Electrolize' rel='stylesheet' type='text/css' />

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<title>Car Rental | Home</title>

<link rel="shortcut" href="images/favicon.ico" />
<link rel="stylesheet" href="css/style.css" media="screen" />
<link rel="stylesheet" href="css/skeleton.css" media="screen" />
<link rel="stylesheet" href="sliders/flexslider/flexslider.css" media="screen" />
<link rel="stylesheet" href="fancybox/jquery.fancybox.css" media="screen" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.transitions.css" type="text/css">
<link href="css/slick.css" rel="stylesheet">
<link href="css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body class="menu-1 h-style-1 text-1">

<div class="wrap">


<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->	

<header id="header" class="clearfix">

<a href="index.html" id="logo"><img src="images/logo.png" alt="Car Rental" /></a>

<nav id="navigation" class="navigation">

<ul>
<li><a href="index.html">Home</a></li>
<li><a href="all-listings.php">Browse All</a></li>
<li class="current-menu-item"><a href="reportGenerator.php">Clerks Action</a></li>
</ul>

</nav><!--/ #navigation-->

</header><!--/ #header-->

<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	
<?php
require_once("DB.php");
global $ConnectingDB;
$Parameter = $_GET["id"];
        // update the car status
        $query_updatecar = "UPDATE Vehicle SET STATUS_ID = 'rented' WHERE VID = $Parameter";
        $stmt_updatecar = $ConnectingDB->prepare($query_updatecar);
        $stmt_updatecar->execute();
   
?>

<html>
<body>
<section class="container py-2 mb-4">
      <div class="row">
        <div class="offset-sm-3 col-sm-6" style="min-height:400px;">

          <div class="card bg-secondary text-light">
            <div class="card-header">
              <h1>enter these please</h1>
              <br>
              </div>
              <div class="card-body bg-dark">
              <form action="returnReciept.php" method = "get">
              <div class="form-group">
              <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id'];?>">
            </div>
                <div class="form-group">
                  <label for="DATE_ID"><span class="FieldInfo"><h4>DATE</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-user"></i> </span>
                    </div>
                    <input type="date" class="form-control" name="DATE_ID" id="cellphone_number" size = 100 style="height:30px; width: 500px" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="TIMEID"><span class="FieldInfo"><h4>TIME</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="time" class="form-control" name="TIMEID" size = 100 style="height:30px; width: 500px" id="name" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="ODOMETER"><span class="FieldInfo"><h4>ODOMETER</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="ODOMETER" size = 100 style="height:30px; width: 500px" id="address" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="FULLTANK"><span class="FieldInfo"><h4>FULLTANK</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="FULLTANK" size = 100  style="height:30px; width: 500px" id="dlicense" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="VALUE_ID"><span class="FieldInfo"><h4>VALUE</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="VALUE_ID" size = 100  style="height:30px; width: 500px" id="dlicense" value="">
                  </div>
                </div>
                <p>
                    <br><br><br>
                    <form action="returnReciept.php" method = "get">
                    <input type = "submit" name = "submit" class="orange button" style="height: 50px; width: 80px;" value = "SIGN UP" />
                </form>
                </p>
        </div>
</form>
</div>
</div>
</div>
</section>
</body>
</html>
