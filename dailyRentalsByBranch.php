<?php
require_once("DB.php");
global $ConnectingDB;
$current_date = date(y-m-d);
$Branch_City = "";
$Branch_LOCATION_ID = "";
// display the number of vehicles rented per category
$query_bycategory = "SELECT Vehicle.VTNAME, COUNT(*)  FROM Rentals, Vehicle 
WHERE Rentals.VLICENSE = Vehicle.VLICENSE AND Rentals.FROMDATE = $current_date AND Vehicle.LOCATION_ID = $Branch_LOCATION_ID AND Vehicle.CITY = $Branch_City
GROUP BY Vehicle.VTNAME";
// display the number of vehicles rented at each branch
$query_bybranch = "SELECT Vehicle.LOCATION_ID, Vehicle.CITY, COUNT(*) FROM Rentals, Vehicle 
WHERE Rentals.VLICENSE = Vehicle.VLICENSE AND Rentals.FROMDATE = $current_date AND Vehicle.LOCATION_ID = $Branch_LOCATION_ID AND Vehicle.CITY = $Branch_City";
// display the number of new rentals across the whole company
$query_all = "SELECT COUNT(*) FROM Rentals 
WHERE Rentals.FROMDATE = $current_date";
?>

