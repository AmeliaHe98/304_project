<!DOCTYPE html>
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Open+Sans:400,600,700|Oswald|Electrolize' rel='stylesheet' type='text/css' />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<title>Car Management | Clerk</title>

	<meta name="description" content="" />
	<meta name="author" content="" />

	<link rel="shortcut" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" media="screen" />
	<link rel="stylesheet" href="css/skeleton.css" media="screen" />
	<link rel="stylesheet" href="fancybox/jquery.fancybox.css" media="screen" />

	<!-- HTML5 Shiv + detect touch events -->
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class="menu-1 h-style-1 text-1">

<div class="wrap">

	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

	<header id="header" class="clearfix">

		<a href="index.html" id="logo"><img src="images/logo.png" alt="Car Rental" /></a>

		<nav id="navigation" class="navigation">

			<ul>
				<li><a href="index.html">Home</a></li>
				<li class="current-menu-item"><a href="all-listings.html">Browse All</a></li>
				<li><a href="sales-reps.html">Clerks Action</a></li>
			</ul>

		</nav><!--/ #navigation-->

	</header><!--/ #header-->

	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->


		<div class="main">

			<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->

			<section class="container content clearfix">

				<div class="sales-reps">

					<h3 class="widget-title">Car Management</h3>

					<div class="row clearfix">

						<?php
						global $ConnectingDB;
						$sql="SELECT * FROM Vehicle";
						$stmt = $ConnectingDB->prepare($sql);
						$stmt -> excute();
						// $stmt = $ConnectingDB->query($sql);
						while($DataRows = $stmt->fetch()){
							$VID		=$DataRows["VID"];
							$VLICENSE	=$DataRows["VLICENSE"];
							$MAKE		=$DataRows["MAKE"];
							$MODEL		=$DataRows["MODEL"];
							$YEAR		=$DataRows["YEAR"];
							$COLOR		=$DataRows["COLOR"];
							$ODOMETER	=$DataRows["ODOMETER"];
							$STATUS_ID	=$DataRows["STATUS_ID"];
							$VTNAME		=$DataRows["VTNAME"];
							$LOCATION_ID=$DataRows["LOCATION_ID"];
							$CITY		=$DataRows["CITY"];
							$GASTYPE_ID	=$DataRows["GASTYPE_ID"];
							$reserved	=$DataRows["reserved"];
						} ?>
							<!-- <?php
							global $ConnectingDB;
							$sql="SELECT * FROM Rentals"  ;
							$stmt = $ConnectingDB->query($sql);
							while($DataRows = $stmt->fetch()){
								$RID		=$DataRows["RID"];
								$VID		=$DataRows["VID"];
								$DLICENSE	=$DataRows["DLICENSE"];
								$FROMDATE		=$DataRows["FROMDATE"];
								$FROMTIME		=$DataRows["FROMTIME"];
								$TODATE		=$DataRows["TODATE"];
								$TOTIME		=$DataRows["TOTIME"];
								$ODOMETER	=$DataRows["ODOMETER"];
								$CARDNO	=$DataRows["CARDNO"];
								$CONFNO		=$DataRows["CONFNO"];

							} ?> -->
							<div class="item">
							<ul>
								<li><h3>Car_name_1</h3></li>
								<li><b>RID:</b>&nbsp;<span> <?php $RID; ?> </span> </li>
								<li><b>VID:</b>&nbsp;<span> <?php $VID; ?> </span></li>
								<li><b>Dlicense:</b>&nbsp;<span> <?php $DLICENSE; ?></span></li>
								<li><b>FromDate:</b>&nbsp;<span><?php $FROMDATE; ?></span></li>
								<li><b>FromTime:</b>&nbsp;<span> <?php $FROMTIME; ?></span></li>
								<li><b>ToDate:</b>&nbsp;<span> <?php $TODATE; ?></span></li>
								<li><b>ToTime:</b>&nbsp;<span> <?php $TOTIME; ?></span></li>
								<li><b>Price:</b>&nbsp;<span> 567</span></li>
								<li><a href="#" class="button orange">Rent</a>
									<a href="#" class="button orange">Return</a></li>
							</ul>
							<tr>
								<th><?php $VID; ?></th>
								<th><?php $RID; ?></th>
								<th><?php $DLICENSE; ?></th>
								<th><?php $FROMDATE; ?></th>
								<th><?php $FROMTIME; ?></th>
								<th><?php $TODATE; ?></th>
								<th><?php $TOTIME; ?></th>

							</tr>

						</div><!--/ .item-->

						<div class="item">

							<ul>
								<li><h3>Car_name_1</h3></li>
								<li><b>RID:</b>&nbsp;<span> 567-8901 </span> </li>
								<li><b>VID:</b>&nbsp;<span> 567-8902</span></li>
								<li><b>Dlicense:</b>&nbsp;<span> 567-8903</span></li>
								<li><b>FromDate:</b>&nbsp;<span>2017-09-10</span></li>
								<li><b>FromTime:</b>&nbsp;<span> 2017-09-10</span></li>
								<li><b>ToDate:</b>&nbsp;<span> 2017-09-10</span></li>
								<li><b>ToTime:</b>&nbsp;<span> 2017-09-10</span></li>
								<li><b>Price:</b>&nbsp;<span> 567</span></li>
								<li><a href="#" class="button orange">Rent</a>
									<a href="#" class="button orange">Return</a></li>
							</ul>

						</div><!--/ .item-->

						<div class="item">

							<ul>
								<li><h3>Car_name_1</h3></li>
								<li><b>RID:</b>&nbsp;<span> 567-8901 </span> </li>
								<li><b>VID:</b>&nbsp;<span> 567-8902</span></li>
								<li><b>Dlicense:</b>&nbsp;<span> 567-8903</span></li>
								<li><b>FromDate:</b>&nbsp;<span>2017-09-10</span></li>
								<li><b>FromTime:</b>&nbsp;<span> 2017-09-10</span></li>
								<li><b>ToDate:</b>&nbsp;<span> 2017-09-10</span></li>
								<li><b>ToTime:</b>&nbsp;<span> 2017-09-10</span></li>
								<li><b>Price:</b>&nbsp;<span> 567</span></li>
								<li><a href="#" class="button orange">Rent</a>
									<a href="#" class="button orange">Return</a></li>
							</ul>

						</div><!--/ .item-->

						<div class="item last">

							<ul>
								<li><h3>Car_name_1</h3></li>
								<li><b>RID:</b>&nbsp;<span> 567-8901 </span> </li>
								<li><b>VID:</b>&nbsp;<span> 567-8902</span></li>
								<li><b>Dlicense:</b>&nbsp;<span> 567-8903</span></li>
								<li><b>FromDate:</b>&nbsp;<span>2017-09-10</span></li>
								<li><b>FromTime:</b>&nbsp;<span> 2017-09-10</span></li>
								<li><b>ToDate:</b>&nbsp;<span> 2017-09-10</span></li>
								<li><b>ToTime:</b>&nbsp;<span> 2017-09-10</span></li>
								<li><b>Price:</b>&nbsp;<span> 567</span></li>
								<li><a href="#" class="button orange">Rent</a>
									<a href="#" class="button orange">Return</a></li>
							</ul>

						</div><!--/ .item-->

					</div><!--/ .row-->

				</div>

			</section><!--/.container -->

			<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->

		</div><!--/ .main-->

			<!-- - - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - - -->





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
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.gmap.min.js"></script>
<script src="js/custom.js"></script>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>
