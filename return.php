<?php
require_once("DB.php");
global $ConnectingDB;
            $query = "SELECT * FROM Vehicle";
            $stmt = $ConnectingDB->prepare($query);
            $stmt->execute();
?>


