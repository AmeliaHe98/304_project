<?php
require_once("DB.php");
global $ConnectingDB;
$current_date = date(y-m-d);
$Branch_City = "";
$Branch_LOCATION_ID = "";
// display the number of vehicles returned per category
$query_bycategory = "SELECT Vehicle.VTNAME, SUM(ReturnCar.VALUE_ID), COUNT(*) FROM ReturnCar, Vehicle 
WHERE ReturnCar.VLICENSE = Vehicle.VLICENSE AND ReturnCar.DATE_ID = $current_date AND Vehicle.LOCATION_ID = $Branch_LOCATION_ID AND Vehicle.CITY = $Branch_City
GROUP BY Vehicle.VTNAME";
// display the number of vehicles returned at each branch
$query_bybranch = "SELECT Vehicle.VTNAME, SUM(ReturnCar.VALUE_ID), COUNT(*) FROM ReturnCar, Vehicle 
WHERE ReturnCar.VLICENSE = Vehicle.VLICENSE AND ReturnCar.DATE_ID = $current_date AND Vehicle.LOCATION_ID = $Branch_LOCATION_ID AND Vehicle.CITY = $Branch_City";
// display the number of new returns across the whole company
$query_all = "SELECT SUM(ReturnCar.VALUE_ID), COUNT(*) FROM ReturnCar
WHERE ReturnCar.DATE_ID = $current_date";
?>