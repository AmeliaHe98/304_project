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
<li ><a href="all-listings.php">Browse All</a></li>
<li class="current-menu-item"><a href="reportGenerator.php">Clerks Action</a></li>
</ul>

</nav><!--/ #navigation-->

</header><!--/ #header-->

<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	
<!-- - - - - - - - - - - - - - - BY BRANCH - - - - - - - - - - - - - - - - -->
<div class="panel-body">
<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
<div>
<form class="" action="clerkmanagement.php" method="POST">
<input type="text" name="Search" value="" placeholder="Search by vtname/ vlicense/ status" size = 100><br><br>
<input type="submit" name="SearchButton" value="Show record">
</form>
</div>
<thead>
<tr>
<caption>ALL VEHICLES</caption>
<th>VID</th>
<th>VLICENSE</th>
<th>MAKE</th>
<th>MODEL</th>
<th>YEAR</th>
<th>COLOR</th>
<th>ODOMETER</th>
<th>STATUS</th>
<th>VTNAME</th>
<th>LOCATION</th>
<th>CITY</th>
<th>RENT</th>
<th>RETURN</th>
</tr>
</thead>

        <?php
		if (isset($_POST["SearchButton"])) {
        ?>
            <div>

            <?php
            global $ConnectingDB;
            $Search = $_POST["Search"];
            if ($Search != null) {
                $query = "SELECT * FROM Vehicle 
                      WHERE VTNAME = :search OR VLICENSE = :search OR STATUS = :search";
            }else {
				$query = "SELECT * FROM Vehicle";
			}
            
			$stmt = $ConnectingDB->prepare($query);
			$stmt->bindValue(':search', $Search);
            $stmt->execute();
            while ($DataRows = $stmt->fetch()) {
                $VID = $DataRows["VID"];
                $VLICENSE = $DataRows["VLICENSE"];
                $MAKE  = $DataRows["MAKE"];
                $MODEL = $DataRows["MODEL"];
                $YEAR  = $DataRows["YEAR"];
                $COLOR = $DataRows["COLOR"];
                 $ODOMETER = $DataRows["ODOMETER"];
                 $STATUS = $DataRows["STATUS"];
                 $VTNAME = $DataRows["VTNAME"];
                 $LOCATION = $DataRows["LOCATION_ID"];
                 $CITY  = $DataRows["CITY"];
                 ?>
            <tr>
            <td><?php echo $VID; ?></td>
            <td><?php echo $VLICENSE; ?></td>
            <td><?php echo $MAKE; ?></td>
            <td><?php echo $MODEL; ?></td>
            <td><?php echo $YEAR; ?></td>
            <td><?php echo $COLOR;?></td>
            <td><?php echo $ODOMETER;?></td>
            <td><?php echo $STATUS;?></td>
            <td><?php echo $VTNAME;?></td>
            <td><?php echo $LOCATION;?></td>
            <td><?php echo $CITY ;?></td>
            <td class="RentButton"> <a href="rent.php?id=<?php echo $VLICENSE; ?>">Rent</a> </td>
            <td class="ReturnButton"> <a href="return.php?id=<?php echo $VLICENSE; ?>">Return</a></td>
            </tr>
          
             
<?php	} //Ending of While Loop
	}//Ending of Submit button

		?>
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
</html>





