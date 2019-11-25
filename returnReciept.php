<?php
require_once("DB.php");
global $ConnectingDB;
$Parameter = $_GET["id"];

if (isset($_GET["submit"])){
    if (empty($_GET["TIMEID"])
    || empty($_GET["ODOMETER"])
    || empty($_GET["DATE_ID"])
    || empty($_GET["FULLTANK"])
    || empty($_GET["VALUE_ID"])) {
        echo "ERROR: HEY! You are creating invaild information! <br/>";
    } else {

// add the information into returns
// SELECT THIS CAR THROUGH VLICENSE and then 
$query_select = "SELECT * FROM Rentals 
WHERE VLICENSE = :Parameter";
$stmt_select = $ConnectingDB->prepare($query_select);
$stmt_select->bindValue(':Parameter', $Parameter);
$EXECUTE = $stmt_select->execute();
$DataRows_select = $stmt_select->fetch();
if (!$EXECUTE) {
    echo "hello";
    print_r($stmt_select->errorInfo());
}
if ($DataRows_select != FALSE) {
$RID = $DataRows_select["RID"];
$CONFNO= $DataRows_select["CONFNO"];

$DATE_ID = $_GET["DATE_ID"];
$TIMEID =  $_GET["TIMEID"];
$ODOMETER = $_GET["ODOMETER"];
$FULLTANK = $_GET["FULLTANK"];
$VALUE_ID = $_GET["VALUE_ID"];
$query_return = "INSERT INTO ReturnCar (RID, DATE_ID, TIME_ID, ODOMETER, FULLTANK, VALUE_ID) 
Values (:RID, :DATE_ID, :TIMEID, :ODOMETER, :FULLTANK, :VALUE_ID)";
$stmt_return = $ConnectingDB->prepare($query_return);
$stmt_return->bindValue(':RID', $RID);
$stmt_return->bindValue(':DATE_ID', $DATE_ID);
$stmt_return->bindValue(':TIMEID', $TIMEID);
$stmt_return->bindValue(':ODOMETER', $ODOMETER);
$stmt_return->bindValue(':FULLTANK', $FULLTANK);
$stmt_return->bindValue(':VALUE_ID', $VALUE_ID);
$Execute = $stmt_return->execute();
if ($Execute) {
    echo 99;
}else{
    print_r($stmt_return->errorInfo());
    echo "error";
}
}
    }
}


// When returning a vehicle, the system will display a receipt with the necessary details 
// (e.g., reservation confirmation number, date of return, how the total was calculated etc.) for the customer.
echo $Parameter;
echo $RID;
echo $CONFNO ;
echo $DATE_ID ;
echo $TIMEID ;
echo $VALUE_ID;

