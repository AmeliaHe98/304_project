<?php
// ? you can comment it out to try
require_once("database.php");
if (isset($_POST["submit"])){
    if (empty($_POST["cellphone_number"])
    || empty($_POST["name"])
    || empty($_POST["dlicense"])
    || empty($_POST["address"])) {
        echo "ERROR: HEY! You are creating an invaild customer! <br/>";
    } else {
        $cellphone = $_POST["cellphone_number"];
        $name = $_POST["name"];
        $dlicense = $_POST["dlicense"];
        $address = $_POST["address"];
        $query = "INSERT INTO Customer (DLICENSE, CELLPHONE, NAME_ID, ADDRESS_ID) 
                Values (:dlicense, :cellphone, :nameid, :addressid)";
        
        global $conn;
        $stmt = $conn->prepare($query);
        $stmt->bindValue(":dlicense", $dlicense);
        $stmt->bindValue(":cellphone", $cellphone);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":address", $address);
        $Execute = $stmt->execute();
        if ($Execute) {
            echo "We have added you, let's start to make reservation !";
        } else {
            echo "insertion fail";
        }
    }
    // we can go back to the reservation page through this statement
    header("http://localhost:8080/304_project/makeReservation.php");
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
              <h1>Add a New Customer</h1>
              <br>
              </div>
              <div class="card-body bg-dark">
              <form class="" action="addCustomer.php" method="post">
                <div class="form-group">
                  <label for="cellphone_number"><span class="FieldInfo"><h4>Cellphone Number</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-user"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="cellphone_number" id="cellphone_number" size = 100 style="height:30px; width: 500px" value="">
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
                </div>
                <br>
                <div class="form-group">
                  <label for="address"><span class="FieldInfo"><h4>Address</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="address" size = 100 style="height:30px; width: 500px" id="address" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="dlicense"><span class="FieldInfo"><h4>Driver license</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="dlicense" size = 100  style="height:30px; width: 500px" id="dlicense" value="">
                  </div>
                </div>
                <p>
                    <br><br><br>
                    <input type = "submit" name = "submit" class="btn btn-info btn-block" style="height: 500px; width: 80px; left: 250; top: 250;" value = "SIGN UP" />
                </p>
            </p>
        </div>
</form>


</body>
<html>