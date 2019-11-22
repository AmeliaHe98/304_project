<?php

$dbServername = "mysql:host=localhost;dbname=carrental";
$dbUsername = "root";
$dbPassword = "";
$dbName = "carrental";

$ConnectingDB = new PDO($dbServername, $dbUsername, $dbPassword);
