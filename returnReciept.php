<?php
require_once("DB.php");
global $ConnectingDB;
$Parameter = $_GET["id"];

if (isset($_POST["submit"])){
    if (empty($_POST["TIMEID"])
    || empty($_POST["ODOMETER"])
    || empty($_POST["DATE_ID"])
    || empty($_POST["FULLTANK"])
    || empty($_POST["VALUE_ID"])) {
        echo "ERROR: HEY! You are creating an invaild information! <br/>";
    } else {

// add the information into returns
// SELECT THIS CAR THROUGH ID and then 
$query_select = "SELECT * FROM Renatls 
WHERE VID = $Parameter";
$stmt_select = $ConnectingDB->prepare($query_select);
$stmt_select->execute();
$DataRows_select = $stmt_select->fetch();
$RID = $DataRows_select["RID"];
$CONFNO= $DataRows_select["CONFNO"];

$DATE_ID = $_POST["DATE_ID"];
$TIMEID =  $_POST["TIMEID"];
$ODOMETER = $_POST["ODOMETER"];
$FULLTANK = $_POST["FULLTANK"];
$VALUE_ID = $_POST["VALUE_ID"];
$query_return = "INSERT INTO ReturnCar (RID, DATE_ID, TIMEID, ODOMETER, FULLTANK, VALUE_ID) 
Values ($RID, $DATE_ID, $TIMEID, $ODOMETER, $FULLTANK, $VALUE_ID)";
$stmt_return = $ConnectingDB->prepare($query_return);
$Execute = $stmt_return->execute();
// When returning a vehicle, the system will display a receipt with the necessary details 
// (e.g., reservation confirmation number, date of return, how the total was calculated etc.) for the customer.
echo $CONFNO + '\n';
echo $DATE_ID + '\n';
echo $TIMEID + '\n';
echo $VALUE_ID + '\n';
    }
}