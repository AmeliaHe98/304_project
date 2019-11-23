
<?php
require_once("DB.php");
$Parameter = $_GET["id"];
// echo $parameter;
// get cartype according to id from car
$query_selecttype = "SELECT * FROM Vehicle 
                      WHERE VID = $Parameter";
$stmt_selecttype = $ConnectingDB->prepare($query_selecttype);
$stmt_selecttype->execute();
$DataRows_selecttype = $stmt_selecttype->fetch();
$VTNAME = $DataRows_selecttype["VTNAME"];
// get information from reservation 
$query_selectreservation = "SELECT * FROM Reservation 
                      WHERE VTNAME = $VTNAME";
$stmt_selectreservation = $ConnectingDB->prepare($query_selectreservation);
$stmt_selectreservation->execute();
$DataRows_selectreservation = $stmt_selectreservation->fetch();
if ($DataRows_selectreservation != FALSE){
$FROMDATE = $DataRows_selectreservation["FROMDATE"];
$FROMTIME = $DataRows_selectreservation["FROMTIME"];
$TODATE = $DataRows_selectreservation["TODATE"];
$TOTIME = $DataRows_selectreservation["TOTIME"];
$CONFNO = $DataRows_selectreservation["CONFNO"];
$DLICENSE = $DataRows_selectreservation["DLICENSE"];
}
$RID = random_int(pow(10, 4), pow(10, 5) - 1);
$VID = $DataRows_selecttype["VID"];
$ODOMETER = $DataRows_selecttype["ODOMETER"];
$
// and then add to rentals
$query_addrentals = "INSERT INTO Renatls (RID, VID, DLICENSE, FROMDATE, FROMTIME, TODATE, TOTIME, ODOMETER, CONFNO) 
                Values ($RID, $VID, $DLICENSE, $FROMDATE, $FROMTIME, $TODATE, $TOTIME $ODOMETER, $CONFNO)";
// update the car status
$query_updatestatus = "UPDATE Vehicle SET STATUS_ID = 'rented' WHERE VID = $Parameter";
$stmt_updatestatus = $ConnectingDB->prepare($query_updatestatus);
$stmt_updatestatus->execute();
// print confirmation number, date of reservation, type of car, location, how long the rental period lasts for etc
?>

<html>
<head>
		<title>Renting Receipt</title>
        </head>
<body>
<p>
    <?php $HOWLONG = $TODATE - $FROMDATE;
          $LOCATION = $DataRows_selecttype["LOCATION"];
    ?>
echo  <?php $DLICENSE ?> <br /> <?php $FROMDATE ?> <br /> <?php $HOWLONG ?> <br /> <?php $VTNAME ?> <br /> <?php $LOCATION ?> <br /> 

</p>

</form>


</body>
<html>
