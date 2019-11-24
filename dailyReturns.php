<?php
require_once("DB.php");
global $ConnectingDB;
$current_date = date(y-m-d);
// display the number of vehicles returned per category
$query_bycategory = "SELECT Vehicle.VTNAME, SUM(ReturnCar.VALUE_ID), COUNT(*) FROM ReturnCar, Vehicle 
WHERE ReturnCar.VLICENSE = Vehicle.VLICENSE AND ReturnCar.DATE_ID = $current_date 
GROUP BY Vehicle.VTNAME";
// display the number of vehicles returned at each branch
$query_bybranch = "SELECT Vehicle.VTNAME, SUM(ReturnCar.VALUE_ID), COUNT(*) FROM ReturnCar, Vehicle 
WHERE ReturnCar.VLICENSE = Vehicle.VLICENSE AND ReturnCar.DATE_ID = $current_date 
GROUP BY Vehicle.LOCATION_ID, Vehicle.CITY";
// display the number of new returns across the whole company
$query_all = "SELECT SUM(ReturnCar.VALUE_ID), COUNT(*) FROM ReturnCar
WHERE ReturnCar.DATE_ID = $current_date";
?>