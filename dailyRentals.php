<?php require_once("DB.php");?>
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
				<li class="current-menu-item"><a href="all-listings.php">Browse All</a></li>
				<li><a href="reportGenerator.php">Clerks Action</a></li>
			</ul>
			
		</nav><!--/ #navigation-->
		
	</header><!--/ #header-->
	
	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	

<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->	
<div>
                 <table width="1000">
                 <caption>BY CATEGORY</caption>
			<tr>
				<th>Vehicle Type</th>
				<th>Count</th>
            </tr>
        
<?php
while ($DataRows_bycategory = $stmt_bycategory->fetch()) {
    $VTNAME = $DataRows_bycategory["VTNAME"];
    $COUNT_EACH_CATEGORY = $DataRows_bycategory["AMOUNT"];
    ?>

    <tr>
    <td><?php echo $VTNAME; ?> </td>
    <td><?php echo $COUNT_EACH_CATEGORY; ?> </td>
    </tr>
    <?php } ?>

</table>
</div>
<br><br><br>

<?php

// display the number of vehicles rented at each branch
$query_bybranch = "SELECT Vehicle.LOCATION_ID, Vehicle.CITY, COUNT(*) AS AMOUNT FROM Rentals, Vehicle 
WHERE Rentals.VLICENSE = Vehicle.VLICENSE AND Rentals.FROMDATE = $current_date GROUP BY Vehicle.LOCATION_ID, Vehicle.CITY";
$stmt_bybranch = $ConnectingDB->prepare($query_bybranch);
$stmt_bybranch->execute();
?>
<div>
                 <table width="1000">
                 <caption>BY BRANCH</caption>
			<tr>
				<th>Location</th>
                <th>City</th>
				<th>Count</th>
            </tr>
        
<?php
while ($DataRows_bybranch = $stmt_bybranch->fetch()) {
    $LOCATION = $DataRows_bybranch["LOCATION_ID"];
    $CITY = $DataRows_bybranch["CITY"];
    $COUNT_EACH_BRANCH = $DataRows_bybranch["AMOUNT"];
    ?>

    <tr>
    <td><?php echo $LOCATION ; ?> </td>
    <td><?php echo $CITY ; ?> </td>
    <td><?php echo $COUNT_EACH_BRANCH; ?> </td>
    </tr>
    <?php } ?>

</table>
</div>
<br><br><br>

<?php
// display the number of new rentals across the whole company
$query_all = "SELECT COUNT(*) AS AMOUNT FROM Rentals 
WHERE Rentals.FROMDATE = $current_date";
$stmt_all = $ConnectingDB->prepare($query_all);
$stmt_all->execute();
?>
<div>
                 <table width="1000">
                 <caption>COMPANY</caption>
			<tr>
				<th>Count</th>
            </tr>
        
<?php
while ($DataRows_all = $stmt_all->fetch()) {
    $COUNT_ALL = $DataRows_all["AMOUNT"];
    ?>

    <tr>
    <td><?php echo $COUNT_ALL; ?> </td>
    </tr>
    <?php } ?>

</table>
</div>

<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->	
	
<footer id="footer" class="container clearfix">
		
		<section class="container clearfix">
			
			<div class="four columns">

				<div class="widget-container widget_text">

					<h3 class="widget-title">About Us</h3>

					<div class="textwidget">

						<p class="white">
							We are a car rental company founded in 2019. 
							We have a great selection of cars for our customers. 
							We provide insurance and equpiments with out cars
						</p>

					</div><!--/ .textwidget-->

				</div><!--/ .widget-container-->	

			</div><!--/ .four .columns-->

			<div class="four columns">

				<div class="widget-container widget_text">

					<h3 class="widget-title">Our Hours</h3>

					<div class="textwidget">

						<ul class="hours">

							<li>Monday <span>8 am to 9 pm</span></li>
							<li>Tuesday <span>8 am to 9 pm</span></li>
							<li>Wednesday <span>8 am to 9 pm</span></li>
							<li>Thursday <span>8 am to 9 pm</span></li>
							<li>Friday <span>8 am to 9 pm</span></li>
							<li>Saturday <span>8 am to 9 pm</span></li>
							<li>Sunday <span>Closed</span></li>

						</ul><!--/ .hours-->

					</div><!--/ .textwidget-->

				</div><!--/ .widget-container-->

			</div><!--/ .four .columns-->

			<div class="four columns">

				<div class="widget-container widget_contacts">

					<h3 class="widget-title">Our Contacts</h3>			

					<ul class="our-contacts">

						<li class="address">
							<b>Address:</b>
							<p>2100 Wesbrook Mall</p>
						</li>
						<li class="phone">
							<b>Phone:</b>&nbsp;<span>+1 (778) 000-1111</span> <br />
						</li>
						<li>
							<b>Email: <a href="mailto:customerService@carrental.com">customerService@carrental.com</a></b>
						</li>
						<li>
							<ul class="social-icons clearfix">
								<li class="twitter"><a title="twitter" href="#">Twitter</a></li>
								<li class="facebook"><a title="facebook" href="#">Facebook</a></li>
							</ul><!--/ .social-icons-->
						</li>

					</ul><!--/ .our-contacts-->

				</div><!--/ .widget-container-->

			</div><!--/ .four .columns-->

			<div class="four columns">

				<div id="gMap" >=</div>

			</div><!--/ .four .columns-->

		</section><!--/ .container-->
		
	</footer><!--/ #footer-->
	
	<!-- - - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - - -->		
  </div><!--/ .wrap-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
<!--[if lt IE 9]>
	<script src="js/selectivizr-and-extra-selectors.min.js"></script>
<![endif]-->
<script src="sliders/flexslider/jquery.flexslider-min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.gmap.min.js"></script>
<script src="js/custom.js"></script>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>

	
