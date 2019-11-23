<?php require_once("DB.php");?>
<!DOCTYPE HTML>
<html lang="en">
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

	<!-- HTML5 Shiv + detect touch events -->
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>


	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->	
	
	<header id="header" class="clearfix">
		
		<a href="index.html" id="logo"><img src="images/logo.png" alt="Car Rental" /></a>
	
		<nav id="navigation" class="navigation">
			
			<ul>
				<li class="current-menu-item"><a href="index.html">Home</a></li>
				<li><a href="all-listings.php">Browse All</a></li>
				<li><a href="sales-reps.html">Clerks Action</a></li>
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
$LOCATION_ID=$_POST['location_id'];
$VTNAME=$_POST['vtname'];
$sql = "SELECT * from Vehicle where Vehicle.VTNAME=:vtname and Vehicle.LOCATION_ID=:location_id";
$query = $ConnectingDB -> prepare($sql);
$query -> bindParam(':vtname',$VTNAME, PDO::PARAM_STR);
$query -> bindParam(':location_id',$LOCATION_ID, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p><span><?php echo htmlentities($cnt);?> Listings</span></p>
</div>
</div>

<?php 

$sql = "SELECT * from Vehicle where Vehicle.VTNAME=:vtname and Vehicle.LOCATION_ID=:location_id";
$query = $ConnectingDB -> prepare($sql);
$query -> bindParam(':vtname',$VTNAME, PDO::PARAM_STR);
$query -> bindParam(':location_id',$LOCATION_ID, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-content">
            <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->VLICENSE);?>"><?php echo htmlentities($result->MAKE);?> , <?php echo htmlentities($result->MODEL);?></a></h5>
            <p class="list-price"><?php echo htmlentities($result->ODOMETER);?> Miles Already Travelled</p>
            <ul>
              <li><?php echo htmlentities($result->COLOR);?> Color</li>
              <li><?php echo htmlentities($result->YEAR);?> Year</li>
            </ul>
            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
      <?php }} ?>
         </div>
      
     <!--Side-Bar-->
     <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Car </h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-carresult.php" method="post">
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

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
