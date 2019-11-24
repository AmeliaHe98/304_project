<?php
require_once("DB.php");
global $ConnectingDB;
$current_date = date(y-m-d);
// display the number of vehicles rented per category
$query_bycategory = "SELECT Vehicle.VTNAME, COUNT(*)  FROM Rentals, Vehicle 
WHERE Rentals.VLICENSE = Vehicle.VLICENSE AND Rentals.FROMDATE = $current_date GROUP BY Vehicle.VTNAME";
// display the number of vehicles rented at each branch
$query_bybranch = "SELECT Vehicle.LOCATION_ID, Vehicle.CITY, COUNT(*) FROM Rentals, Vehicle 
WHERE Rentals.VLICENSE = Vehicle.VLICENSE AND Rentals.FROMDATE = $current_date GROUP BY Vehicle.LOCATION_ID, Vehicle.CITY";
// display the number of new rentals across the whole company
$query_all = "SELECT COUNT(*) FROM Rentals 
WHERE Rentals.FROMDATE = $current_date";
?>

