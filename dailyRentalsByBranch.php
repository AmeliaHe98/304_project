<?php
require_once("DB.php");
global $ConnectingDB;
$current_date = date(y-m-d);
$Branch_City = "";
$Branch_LOCATION_ID = "";
// display the number of vehicles rented per category
$query_bycategory = "SELECT Vehicle.VTNAME, COUNT(*) AS AMOUNT FROM Rentals, Vehicle 
WHERE Rentals.VLICENSE = Vehicle.VLICENSE AND Rentals.FROMDATE = $current_date AND Vehicle.LOCATION_ID = $Branch_LOCATION_ID AND Vehicle.CITY = $Branch_City
GROUP BY Vehicle.VTNAME";
$stmt_bycategory = $ConnectingDB->prepare($query_bycategory);
$stmt_bycategory->execute();
?>
<div>
                 <table width="1000">
                 <caption>BY CATEGORY in <?php $Branch_City + $Branch_LOCATION_ID?></caption>
			<tr>
				<th>Vehicle Type</th>
				<th>Count</th>
            </tr>
        
<?php
while ($DataRows_bycategory = $stmt_bycategory->fetch()) {
    $VTNAME = $DataRows_bycategory["VTNAME"];
    $COUNT_EACH_CATEGORY = $DataRows_bycategory["AMOUNT"];
    ?>

    <tr>
    <td><?php echo $VTNAME; ?> </td>
    <td><?php echo $COUNT_EACH_CATEGORY; ?> </td>
    </tr>
    <?php } ?>

</table>
</div>
<br><br><br>


<?
// display the number of vehicles rented at each branch
$query_bybranch = "SELECT Vehicle.LOCATION_ID, Vehicle.CITY, COUNT(*) AS AMOUNT FROM Rentals, Vehicle 
WHERE Rentals.VLICENSE = Vehicle.VLICENSE AND Rentals.FROMDATE = $current_date AND Vehicle.LOCATION_ID = $Branch_LOCATION_ID AND Vehicle.CITY = $Branch_City";
$stmt_bybranch = $ConnectingDB->prepare($query_bybranch);
$stmt_bybranch->execute();
?>
<div>
                 <table width="1000">
                 <caption>BY BRANCH <?php $Branch_City + $Branch_LOCATION_ID?> </caption>
			<tr>
				<th>Location</th>
                <th>City</th>
				<th>Count</th>
            </tr>
        
<?php
while ($DataRows_bybranch = $stmt_bybranch->fetch()) {
    $LOCATION = $DataRows_bybranch["LOCATION_ID"];
    $CITY = $DataRows_bybranch["CITY"];
    $COUNT_EACH_BRANCH = $DataRows_bybranch["AMOUNT"];
    ?>

    <tr>
    <td><?php echo $LOCATION ; ?> </td>
    <td><?php echo $CITY ; ?> </td>
    <td><?php echo $COUNT_EACH_BRANCH; ?> </td>
    </tr>
    <?php } ?>
    </table>
    </div>
    <br><br><br>

<?php
// display the number of new rentals across the whole company
$query_all = "SELECT COUNT(*) AS AMOUNT FROM Rentals 
WHERE Rentals.FROMDATE = $current_date";
$stmt_all = $ConnectingDB->prepare($query_all);
$stmt_all->execute();
?>
<div>
                 <table width="1000">
                 <caption>COMPANY</caption>
			<tr>
				<th>Count</th>
            </tr>
        
<?php
while ($DataRows_all = $stmt_all->fetch()) {
    $COUNT_ALL = $DataRows_all["AMOUNT"];
    ?>

    <tr>
    <td><?php echo $COUNT_ALL; ?> </td>
    </tr>
    <?php } ?>

</table>
</div>

