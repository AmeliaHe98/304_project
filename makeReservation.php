<?php
// query code for making reservation
require_once("DB.php");
// include ('all-listings.php');
$vtname = $_GET["vtname"];
$fromDate = $_GET["fromdate"];
$fromTime = $_GET["fromtime"];
$toDate = $_GET["todate"];
$toTime = $_GET["totime"];    
if (isset($_POST["submit"])) {
    // empty input
    if (empty($_POST["dlicense"])
    || empty($_POST["name"])) {
        echo "ERROR: HEY! You are entering an invaild customer! <br/>";
    } else{    
        // make reservation successfully
        $dlicense = $_POST["dlicense"];
        $name = $_POST["name"];
        global $ConnectingDB;
        // there is a customer registered
        $query_select_customer = "SELECT DISTINCT * FROM Customer Where DLICENSE =  $dlicense";
        $stmt_customer = $ConnectingDB -> prepare($query_select_customer);
        $stmt_customer->execute();
        $count = $stmt_customer->rowCount();
        if ($count > 0) {
            $confirmationNum = rand(pow(10, 8), pow(10, 9) - 1);
            // $date_1 = date('H:i:s', strtotime("$fromTime"));
            // $formatted_fromTime = $date_1->format('H:i:s');
            $date_1 = date('H:i:s', strtotime($fromTime));
            // $formatted = $date_1->format('H:i:s');
            $date_2 = date('H:i:s', strtotime($toTime));
            // $formatted_toTime = $date_2->format('H:i:s');
            $query_insert_reservation = "INSERT INTO Reservation (CONFNO, VTNAME, DLICENSE, FROMDATE, FROMTIME, TODATE, TOTIME) 
            Values (:confirmationNum, :vtname, :dlicense, :fromDate, :date_1, :toDate, :date_2)";
            // Values ($confirmationNum, NULL, $dlicense, NULL, NULL, NULL, NULL, NULL)";
            $stmt_reservation = $ConnectingDB -> prepare($query_insert_reservation);
            $stmt_reservation->bindValue(':confirmationNum', $confirmationNum);
            $stmt_reservation->bindValue(':vtname', $vtname);
            $stmt_reservation->bindValue(':dlicense', $dlicense);
            $stmt_reservation->bindValue(':fromDate', $fromDate);
            $stmt_reservation->bindValue(':date_1', $date_1);
            $stmt_reservation->bindValue(':toDate', $toDate);
            $stmt_reservation->bindValue(':date_2', $date_2);
             $Execute = $stmt_reservation->execute();
             if ($Execute) {
                          echo "you have reserved this car!";
                        } else {
                          echo "insertion fail";
                        }
                      } else {
            // go to add Customer page
            header("Location: http://localhost:8080/304_project/addCustomer.php");
            exist();
          }
       
    }
        
}
    

?>

<html>

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
<body class="menu-1 h-style-1 text-1">

<div class="wrap">

<header id="header" class="clearfix">
		
        <a href="index.html" id="logo"><img src="images/logo.png" alt="Car Rental" /></a>
        
	</header><!--/ #header-->

    
 <div style="text-align:center">
<p>

<body>
<p>
<section class="container py-2 mb-4">
      <div class="row">
        <div class="offset-sm-3 col-sm-6" style="min-height:400px;">

          <div class="card bg-secondary text-light">
            <div class="card-header">
              <h1>Make Reservation</h1>
              <br><br><br>  
              </div>
              <div class="card-body bg-dark">
              <form class="" action = "" method="post">
                <div class="form-group">
                  <label for="dlicense"><span class="FieldInfo"><h4>Driver License</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-user"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="dlicense" id="dlicense" size = 100 style="height:30px; width: 500px" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="name"><span class="FieldInfo"><h4>Name</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="name" size = 100 style="height:30px; width: 500px" id="name" value="">
                  </div>
                  <p>
                    <br><br><br>
                    <input type = "submit" name = "submit" class="btn btn-info btn-block" style="height: 500px; width: 80px; left: 300; top: 300;" value = "RESERVE" />
                </p>
                </div>
                <br>
            </div>
            </form>

</div>