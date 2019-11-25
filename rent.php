<?php
require_once("DB.php");
$Parameter = $_GET["id"]; ?>
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
<?php
// echo $parameter;
// get cartype according to VLICENSE from car
$query_selecttype = "SELECT * FROM Vehicle 
                      WHERE VLICENSE = :Parameter";
$stmt_selecttype = $ConnectingDB->prepare($query_selecttype);
$stmt_selecttype->bindValue(':Parameter', $Parameter);
$stmt_selecttype->execute();
$DataRows_selecttype = $stmt_selecttype->fetch();
$VTNAME = $DataRows_selecttype["VTNAME"];
// get information from reservation 
$query_selectreservation = "SELECT * FROM Reservation 
                      WHERE VTNAME = '$VTNAME'";
$stmt_selectreservation = $ConnectingDB->prepare($query_selectreservation);
$stmt_selectreservation->execute();
$count = $stmt_selectreservation->rowCount();
if ($count > 0) {
    
    $DataRows_selectreservation = $stmt_selectreservation->fetch();
    if ($DataRows_selectreservation != FALSE){
    // echo $count;
    $FROMDATE = $DataRows_selectreservation["FROMDATE"];
    $FROMTIME = $DataRows_selectreservation["FROMTIME"];
    $TODATE = $DataRows_selectreservation["TODATE"];
    $TOTIME = $DataRows_selectreservation["TOTIME"];
    $CONFNO = $DataRows_selectreservation["CONFNO"];
    $DLICENSE = $DataRows_selectreservation["DLICENSE"];
    }
    $RID = rand(pow(10, 4), pow(10, 5) - 1);
    $VLICENSE = $DataRows_selecttype["VLICENSE"];
    $ODOMETER = $DataRows_selecttype["ODOMETER"];
}else {
    echo $count;
    echo $VTNAME;
    $FROMDATE = null;
    $FROMTIME = null;
    $TODATE = null;
    $TOTIME = null;
    $CONFNO = 000000;
    $DLICENSE = 000000;
    $RID = rand(pow(10, 4), pow(10, 5) - 1);
    $VLICENSE = $DataRows_selecttype["VLICENSE"];
    $ODOMETER = $DataRows_selecttype["ODOMETER"];
}


// and then add to rentals
$query_addrentals = "INSERT INTO Renatls (RID, VLICENSE, DLICENSE, FROMDATE, FROMTIME, TODATE, TOTIME, ODOMETER, CONFNO) 
                Values (:RID, :VLICENSE, :DLICENSE, :FROMDATE, :FROMTIME, :TODATE, :TOTIME, :ODOMETER, :CONFNO)";
            $stmt_addrentals = $ConnectingDB->prepare($query_addrentals);
            $stmt_addrentals->bindValue(':RID', $RID);
            $stmt_addrentals->bindValue(':VLICENSE', $VLICENSE);
            $stmt_addrentals->bindValue(':DLICENSE', $DLICENSE);
            $stmt_addrentals->bindValue(':FROMDATE', $FROMDATE);
            $stmt_addrentals->bindValue(':FROMTIME', $FROMTIME);
            $stmt_addrentals->bindValue(':TODATE', $TODATE);
            $stmt_addrentals->bindValue(':TOTIME', $TOTIME);
            $stmt_addrentals->bindValue(':ODOMETER', $ODOMETER);
            $stmt_addrentals->bindValue(':CONFNO', $CONFNO);
            $Execute_a = $stmt_addrentals->execute();
            if ($Execute_a) {
                echo "HELLO";
            }
// update the car status
$query_updatestatus = "UPDATE Vehicle SET STATUS = 'rented' WHERE VLICENSE = :Parameter";
$stmt_updatestatus = $ConnectingDB->prepare($query_updatestatus);
$stmt_updatestatus->bindValue(':Parameter', $Parameter);
$Execute_b = $stmt_updatestatus->execute();
// if ($Execute_b) {
//     echo 88;
// }
// print confirmation number, date of reservation, type of car, location, how long the rental period lasts for etc
?>

<!-- - - - - - - - - - - - - - - BY CATEGORY - - - - - - - - - - - - - - - - -->	
<div class="panel-body">
<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
<thead>
<tr>
<caption>Renting Receipt</caption>
<th>Confirmation number</th>
<th>From date</th>
<th>To date</th>
<th>How Long String</th> 
<th>Location</th> 
<th>Vehicle Type</th> 
<th>Reservation ID</th> 
<th>Location</th> 
</tr>
</thead>

    <?php 
    $date1Timestamp = strtotime($TODATE);
    $date2Timestamp = strtotime($FROMDATE);
    $HOWLONG = ($date2Timestamp - $date1Timestamp) / (3600*24);
    $HOWLONG_stirng = explode("-", "$HOWLONG")[1];
    $LOCATION = $DataRows_selecttype["LOCATION_ID"];
    ?>
    <tr>
    <td><?php echo $CONFNO; ?></td>
    <td><?php echo $FROMDATE; ?></td>
    <td><?php echo $TODATE; ?></td>
    <td><?php echo $HOWLONG_stirng; ?></td>
    <td><?php echo $LOCATION;?></td>
    <td><?php echo $VTNAME;?></td>
    <td><?php echo $RID;?></td>
    <td><?php echo $LOCATION;?></td>
    </tr>

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
</html>



