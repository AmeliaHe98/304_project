<?php
// require_once("");
if (isset($_POST["submit"])){
    if (empty($_POST["cellphone_number"])
    || empty($_POST["name"])
    || empty($_POST["dlicense"])
    || empty($_POST["address"])) {
        echo "ERROR: HEY! You are creating an invaild customer! <br/>";
    } else {
        $cellphone = $_POST["cellphone_number"];
        $name = $_POST["name"];
        $dlicense = $_POST["dlicense"];
        $address = $_POST["address"];
        $query = "INSERT INTO Customer (cellphone, name, address, dlicense) 
                Values (:cellphone, :name, :address, :dlicense)";
        
    }
}
?>




<html>
<head>
<title>Add Customer</title>
</head>
<body>
<form action = "http://localhost:8080/304_project/addCustomer.php" method = "post">

 <b> Add a New Customer</b>

 <p> Cellphone Number:
 <input type = "text" name = "cellphone_number" size = 30 value = "">
 </p>

 <p> Name:
 <input type = "text" name = "name" size = 30 value = "">
 </p>

 <p> Address:
 <input type = "text" name = "address" size = 30 value = "">
 </p>

 <p> Driver license:
 <input type = "text" name = "dlicense" size = 30 value = "">
 </p>


<p>
<input type = "submit" name = "submit" value = "Send" />
</p>

</form>

</body>
<html>