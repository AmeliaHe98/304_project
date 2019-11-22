
<?php
require_once("DB.php");
?>
<!DOCTYPE>
<html>
	<head>
		<title>View Data from Database</title>
        </head>
	<body>
		<div>
        <form class="" action="clerkmanagement.php" method="POST">
					<input type="text" name="Search" value="" placeholder="Search by vtname" size = 100><br><br>
					<input type="submit" name="SearchButton" value="Search record">
				</form>
		</div>

        <?php
		if (isset($_POST["SearchButton"])) {
        ?>
            <div>
                 <table width="1000">
                 <caption>Search Result</caption>
			<tr>
				<th>VID</th>
				<th>VLICENSE</th>
				<th>MAKE</th>
				<th>MODEL</th>
				<th>YEAR</th>
				<th>COLOR</th>
				<th>ODOMETER</th>
                <th>STATUS</th>
                <th>VTNAME</th>
                <th>LOCATION</th>
                <th>CITY</th>
                <th>RENT</th>
                <th>RETURN</th>
            </tr>

            <?php
            global $ConnectingDB;
            $Search = $_POST["Search"];
            $query = "SELECT * FROM Vehicle WHERE VTNAME = $Search";
            $stmt = $ConnectingDB->prepare($query);
            $stmt->execute();
            while ($DataRows = $stmt->fetch()) {
                $VID = $DataRows["VID"];
                $VLICENSE = $DataRows["VLICENSE"];
                $MAKE  = $DataRows["MAKE"];
                $MODEL = $DataRows["MODEL"];
                $YEAR  = $DataRows["YEAR"];
                $COLOR = $DataRows["COLOR"];
                 $ODOMETER = $DataRows["ODOMETER"];
                 $STATUS = $DataRows["STATUS_ID"];
                 $VTNAME = $DataRows["VTNAME"];
                 $LOCATION = $DataRows["LOCATION_ID"];
                 $CITY  = $DataRows["CITY"];
                 ?>
            <tr>
            <td><?php echo $VID; ?></td>
            <td><?php echo $VLICENSE; ?></td>
            <td><?php echo $MAKE; ?></td>
            <td><?php echo $MODEL; ?></td>
            <td><?php echo $YEAR; ?></td>
            <td><?php echo $COLOR;?></td>
            <td><?php echo $ODOMETER;?></td>
            <td><?php echo $STATUS;?></td>
            <td><?php echo $VTNAME;?></td>
            <td><?php echo $LOCATION;?></td>
            <td><?php echo $CITY ;?></td>
            <td class="RentButton"> <a href="rent.php?id=<?php echo $VID; ?>">Rent</a> </td>
            <td class="ReturnButton"> <a href="return.php?id=<?php echo $VID; ?>">Return</a></td>
            </tr>
          
             
<?php	} //Ending of While Loop
	}//Ending of Submit button

		?>
</table>
</div>
</body>
</html>




