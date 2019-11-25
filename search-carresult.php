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

<!--Listing-->
<section class="listing-page">
<div class="container">
<div class="row">
<div class="col-md-9 col-md-push-3">
<div class="result-sorting-wrapper">
<div class="sorting-count">
<?php
//Query for Listing count
$LOCATION_ID=$_GET["location_id"];
$VTNAME=$_GET["vtname"];
if($LOCATION_ID=='Select Location Type' && $VTNAME=='Select Vehicle Type'){
	$query = $ConnectingDB -> prepare('SELECT * FROM Vehicle WHERE Vehicle.STATUS = "available"');
	$query->execute();
	$results=$query->fetchAll();
}
else if($LOCATION_ID=='Select Location Type' && $VTNAME!='Select Vehicle Type'){
	//write a query
	$query = $ConnectingDB -> prepare('SELECT * from Vehicle where Vehicle.VTNAME=:vtname and Vehicle.STATUS = "available"');
	$query -> bindValue(':vtname',$VTNAME, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll();
}
else if($LOCATION_ID!='Select Location Type' && $VTNAME=='Select Vehicle Type'){
	//write a query
	$query = $ConnectingDB -> prepare('SELECT * from Vehicle where Vehicle.LOCATION_ID=:location_id and Vehicle.STATUS = "available"' );
	$query -> bindValue(':location_id',$LOCATION_ID, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll();
}
else{
	//wrtie a query when we have both location and vehicle type
	$sql = "SELECT * from Vehicle where Vehicle.VTNAME=:vtname and Vehicle.LOCATION_ID=:location_id and Vehicle.STATUS = 'available' ";
	$query = $ConnectingDB -> prepare($sql);
	$query -> bindValue(':vtname',$VTNAME, PDO::PARAM_STR);
	$query -> bindValue(':location_id',$LOCATION_ID, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll();
}

$cnt=$query->rowCount();
?>
<p><span><?php echo htmlentities($cnt);?> Listings</span></p>
</div>
</div>

<?php
if($LOCATION_ID=='Select Location Type' && $VTNAME=='Select Vehicle Type'){
	$query = $ConnectingDB -> prepare('SELECT * FROM Vehicle where Vehicle.STATUS = "available"');
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);

}
else if($LOCATION_ID=='Select Location Type' && $VTNAME!='Select Vehicle Type'){
	//write a query
	$query = $ConnectingDB -> prepare('SELECT * from Vehicle where Vehicle.VTNAME=:vtname and Vehicle.STATUS = "available"');
	$query -> bindValue(':vtname',$VTNAME, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
}
else if($LOCATION_ID!='Select Location Type' && $VTNAME=='Select Vehicle Type'){
	//write a query
	$query = $ConnectingDB -> prepare('SELECT * from Vehicle where Vehicle.LOCATION_ID=:location_id and Vehicle.STATUS = "available" ');
	$query -> bindValue(':location_id',$LOCATION_ID, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
}
else{
	//wrtie a query when we have both location and vehicle type
	$sql = 'SELECT * from Vehicle where Vehicle.VTNAME=:vtname and Vehicle.LOCATION_ID=:location_id and Vehicle.STATUS = "available"';
	$query = $ConnectingDB -> prepare($sql);
	$query -> bindValue(':vtname',$VTNAME, PDO::PARAM_STR);
	$query -> bindValue(':location_id',$LOCATION_ID, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
}

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="images/vehicleimages/<?php echo htmlentities($result->VTNAME);?>.jpg" class="img-responsive" alt="Image" /> </a>
          </div>
          <div class="product-listing-content">
            <h5><a href="vehical-details.php?vtname=<?php echo htmlentities($result->VTNAME);?>"></h5>
            <p class="list-price">Vehicle Type:<?php echo htmlentities($result->VTNAME);?></p>
            <ul>
              <li><?php echo htmlentities($result->LOCATION_ID);?></li>
              <li><?php echo htmlentities($result->CITY);?></li>
            </ul>
            <a href="vehical-details.php?vtname=<?php echo htmlentities($result->VTNAME);?>" class="btn">Reserve <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
      <?php }} ?>
         </div>

<!--Side-Bar-->
<aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5></i> Find Your Car </h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-carresult.php" method="get">
              <div class="form-group select">
                <select class="form-control" name="vtname">
				  <option>Select Vehicle Type</option>
				  <?php $sql = "SELECT distinct VTNAME FROM Vehicle";
				  $query = $ConnectingDB -> prepare($sql);
				  $query->execute();
				  $results=$query->fetchAll(PDO::FETCH_OBJ);
				  $cnt=1;
				  if($query->rowCount() > 0){
					  foreach($results as $result)
					  {       ?>
					  <option value="<?php echo htmlentities($result->VTNAME);?>"><?php echo htmlentities($result->VTNAME);?></option>
					  <?php }} ?>
					</select>
				</div>
				<div class="form-group select">
                <select class="form-control" name="location_id">
					<option>Select Location Type</option>
					<?php $sql = "SELECT distinct LOCATION_ID FROM Vehicle";
					$query = $ConnectingDB -> prepare($sql);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0){
						foreach($results as $result)
						{       ?>
						<option value="<?php echo htmlentities($result->LOCATION_ID);?>"><?php echo htmlentities($result->LOCATION_ID);?></option>
						<?php }} ?>
					</select>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
				</div>
			</form>
		</div>
	</div>
</aside>
      <!--/Side-Bar-->
    </div>
  </div>
</section>
<!-- /Listing-->

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
