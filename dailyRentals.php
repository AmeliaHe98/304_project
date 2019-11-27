<?php
require_once("DB.php");
global $ConnectingDB;
$current_date = date(y-m-d);
// display the number of vehicles rented per category
$query_bycategory = "SELECT v.VTNAME, COUNT(*)  FROM Rentals r, Vehicle v WHERE r.VID = v.VID r.FROMDATE = $current_date GROUP BY v.VTNAME";
// display the number of vehicles rented at each branch
$query_bybranch = "SELECT v.LOCATION_ID, v.CITY, COUNT(*)  FROM Rentals r, Vehicle v WHERE r.VID = v.VID r.FROMDATE = $current_date GROUP BY v.LOCATION_ID, v.CITY";
// display the number of new rentals across the whole company
$query_all = "SELECT COUNT(*) WHERE r.FROMDATE = $current_date FROM Rentals";

?>

