<?php
require_once("DB.php");
$Parameter = $_GET["id"];
// echo $parameter;
// get cartype according to VLICENSE from car
$query_selecttype = "SELECT * FROM Vehicle 
                      WHERE VLICENSE = $Parameter";
$stmt_selecttype = $ConnectingDB->prepare($query_selecttype);
$stmt_selecttype->execute();
$DataRows_selecttype = $stmt_selecttype->fetch();
$VTNAME = $DataRows_selecttype["VTNAME"];
// get information from reservation 
$query_selectreservation = "SELECT * FROM Reservation 
                      WHERE VTNAME = '$VTNAME'";
$stmt_selectreservation = $ConnectingDB->prepare($query_selectreservation);
$stmt_selectreservation->execute();
$count = $stmt_selectreservation->rowCount();
if ($count > 0) {
    
    $DataRows_selectreservation = $stmt_selectreservation->fetch();
    if ($DataRows_selectreservation != FALSE){
    echo $count;
    $FROMDATE = $DataRows_selectreservation["FROMDATE"];
    $FROMTIME = $DataRows_selectreservation["FROMTIME"];
    $TODATE = $DataRows_selectreservation["TODATE"];
    $TOTIME = $DataRows_selectreservation["TOTIME"];
    $CONFNO = $DataRows_selectreservation["CONFNO"];
    $DLICENSE = $DataRows_selectreservation["DLICENSE"];
    }
    $RID = random_int(pow(10, 4), pow(10, 5) - 1);
    $VLICENSE = $DataRows_selecttype["VLICENSE"];
    $ODOMETER = $DataRows_selecttype["ODOMETER"];
}else {
    echo $count;
    echo $VTNAME;
    $FROMDATE = null;
    $FROMTIME = null;
    $TODATE = null;
    $TOTIME = null;
    $CONFNO = 000000;
    $DLICENSE = 000000;
    $RID = random_int(pow(10, 4), pow(10, 5) - 1);
    $VLICENSE = $DataRows_selecttype["VLICENSE"];
    $ODOMETER = $DataRows_selecttype["ODOMETER"];
}


// and then add to rentals
$query_addrentals = "INSERT INTO Renatls (RID, VLICENSE, DLICENSE, FROMDATE, FROMTIME, TODATE, TOTIME, ODOMETER, CONFNO) 
                Values ($RID, $VLICENSE, $DLICENSE, $FROMDATE, $FROMTIME, $TODATE, $TOTIME $ODOMETER, $CONFNO)";
            $stmt_addrentals = $ConnectingDB->prepare($query_addrentals);
            $Execute_a = $stmt_addrentals->execute();
            if ($Execute_a) {
                echo 888;
            }
// update the car status
$query_updatestatus = "UPDATE Vehicle SET STATUS = 'rented' WHERE VLICENSE = $Parameter";
$stmt_updatestatus = $ConnectingDB->prepare($query_updatestatus);
$Execute_b = $stmt_updatestatus->execute();
if ($Execute_b) {
    echo 88;
}
// print confirmation number, date of reservation, type of car, location, how long the rental period lasts for etc
?>

<html>
<head>
		<title>Renting Receipt</title>
        </head>
<body>
<p>
    <?php 
    $date1Timestamp = strtotime($TODATE);
    $date2Timestamp = strtotime($FROMDATE);
    $HOWLONG = ($date2Timestamp - $date1Timestamp) / (3600*24);
    $HOWLONG_stirng = explode("-", "$HOWLONG")[1];
    $LOCATION = $DataRows_selecttype["LOCATION_ID"];
    ?>
<?php echo $DLICENSE; echo $FROMDATE;
// echo $TODATE;
  echo $HOWLONG_stirng; echo $VTNAME; echo $LOCATION; echo $RID?> <br /> 

</p>

</form>


</body>
<html>