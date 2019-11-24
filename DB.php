<?php
$DSN='mysql:host=localhost; dbname=carrental';
$ConnectingDB = new PDO($DSN, 'root', '');
$conn = $ConnectingDB ;

$ConnectingDB = new PDO($dbServername, $dbUsername, $dbPassword);
