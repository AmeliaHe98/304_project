<?php
// query code for making reservation
require_once("DB.php");
require_once("all-listings.php");
if (isset($_POST["submit"])) {
    // empty input
    if (empty($_POST["cellphone_number"])
    || empty($_POST["name"])) {
        echo "ERROR: HEY! You are entering an invaild customer! <br/>";
    } else{
        // use includes to send me this information
        $address = $_POST["address"];
        $vtname = $_POST["vtname"];
        $fromDate = $_POST["fromDate"];
        $fromTime = $_POST["fromTime"];
        $toDate = $_POST["toDate"];
        $toTime = $_POST["toTime"];
        // make reservation successfully
        $dlicense = $_POST["dlicense"];
        $name = $_POST["name"];
        // there is a customer registered
        $query_select_customer = "SELECT * FROM Customer Where dlicense =  $dlicense";
        $result = mysql_query($ConnectingDB, $query_select_customer);
        if (mysql_num_rows($result) > 0) {
            $confirmationNum = rand(pow(10, 8), pow(10, 9) - 1);
            $query_insert_reservation = "INSERT INTO Reservation (confNo, vtname, dlicense, fromDate, fromTime, toDate, toTime) 
                    Values ($confirmationNum, $vtname, $dlicense, $address, $fromDate, $fromTime, $toDate, $toTime)";
                     mysqli_query($ConnectingDB, $query_insert_reservation);
                     if (mysql_affected_rows == 1) {
                         //  The database state should reflect this at the end of the action
                         echo "reservation has made!";
                         // don't forget to appear confirmation number
                         mysql_close($ConnectingDB);
                     } else {
                         echo "insertion fail";
                         mysql_close($ConnectingDB
                        );
                     }
        } else {
            // go to add Customer page
            header("http://localhost:8080/304_project/makeReservation.php");
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
              <form class="" action="makeReservation.php" method="post">
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
</div>