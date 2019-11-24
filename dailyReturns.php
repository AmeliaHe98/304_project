<?php
require_once("DB.php");
global $ConnectingDB;
$current_date = date(y-m-d);
// display the number of vehicles returned per category
$query_bycategory = "SELECT Vehicle.VTNAME, SUM(ReturnCar.VALUE_ID) AS REVENUE, COUNT(*) AS AMOUNT FROM ReturnCar, Vehicle 
WHERE ReturnCar.VLICENSE = Vehicle.VLICENSE AND ReturnCar.DATE_ID = $current_date 
GROUP BY Vehicle.VTNAME";
$stmt_bycategory = $ConnectingDB->prepare($query_bycategory);
$stmt_bycategory->execute();

?>
<div>
                 <table width="1000">
                 <caption>BY CATEGORY</caption>
			<tr>
				<th>Vehicle Type</th>
                <th>Revenue</th>
				<th>Count</th>
            </tr>
        
<?php
while ($DataRows_bycategory = $stmt_bycategory->fetch()) {
    $VTNAME = $DataRows_bycategory["VTNAME"];
    $REVENUE = $DataRows_bycategory["REVENUE"];
    $COUNT_EACH_CATEGORY = $DataRows_bycategory["AMOUNT"];
    ?>

    <tr>
    <td><?php echo $VTNAME; ?> </td>
    <td><?php echo $REVENUE; ?> </td>
    <td><?php echo $COUNT_EACH_CATEGORY; ?> </td>
    </tr>
    <?php } ?>

</table>
</div>
<br><br><br>



<?php
// display the number of vehicles returned at each branch
$query_bybranch = "SELECT Vehicle.VTNAME, SUM(ReturnCar.VALUE_ID) AS REVENUE, COUNT(*) AS AMOUNT FROM ReturnCar, Vehicle 
WHERE ReturnCar.VLICENSE = Vehicle.VLICENSE AND ReturnCar.DATE_ID = $current_date 
GROUP BY Vehicle.LOCATION_ID, Vehicle.CITY";
$stmt_bybranch = $ConnectingDB->prepare($query_bybranch);
$stmt_bybranch->execute();
?>

<div>
                 <table width="1000">
                 <caption>BY BRANCH</caption>
			<tr>
				<th>Location</th>
                <th>City</th>
                <th>Revenue</th>
				<th>Count</th>
            </tr>
        
<?php
while ($DataRows_bybranch = $stmt_bybranch->fetch()) {
    $LOCATION = $DataRows_bybranch["LOCATION_ID"];
    $CITY = $DataRows_bybranch["CITY"];
    $REVENUE = $DataRows_bybranch["REVENUE"];
    $COUNT_EACH_BRANCH = $DataRows_bybranch["AMOUNT"];
    ?>

    <tr>
    <td><?php echo $LOCATION ; ?> </td>
    <td><?php echo $CITY ; ?> </td>
    <td><?php echo $REVENUE; ?> </td>
    <td><?php echo $COUNT_EACH_BRANCH; ?> </td>
    </tr>
    <?php } ?>

</table>
</div>
<br><br><br>



<?php
// display the number of new returns across the whole company
$query_all = "SELECT SUM(ReturnCar.VALUE_ID) AS REVENUE, COUNT(*) AS AMOUNT FROM ReturnCar
WHERE ReturnCar.DATE_ID = $current_date";
$stmt_all = $ConnectingDB->prepare($query_all);
$stmt_all->execute();
?>
<div>
                 <table width="1000">
                 <caption>COMPANY</caption>
			<tr>
            <th>Revenue</th>
			<th>Count</th>
            </tr>
        
<?php
while ($DataRows_all = $stmt_all->fetch()) {
    $REVENUE = $DataRows_all["REVENUE"];
    $COUNT_ALL = $DataRows_all["AMOUNT"];
    ?>

    <tr>
    <td><?php echo $REVENUE; ?> </td>
    <td><?php echo $COUNT_ALL; ?> </td>
    </tr>
    <?php } ?>

</table>
</div>

