<?php
require_once("DB.php");
global $ConnectingDB;

        // update the car status
        $query_updatecar = "UPDATE Vehicle SET STATUS_ID = 'rented' WHERE VID = $Parameter";
        $stmt_updatecar = $ConnectingDB->prepare($query_updatecar);
        $stmt_updatecar->execute();
        
   

?>

<html>
<body>
<p>
<section class="container py-2 mb-4">
      <div class="row">
        <div class="offset-sm-3 col-sm-6" style="min-height:400px;">

          <div class="card bg-secondary text-light">
            <div class="card-header">
              <h1>enter these please</h1>
              <br>
              </div>
              <div class="card-body bg-dark">
              <form class="" action="returnReciept.php?id=<?php echo $_GET["id"];?>" method="post">
                <div class="form-group">
                  <label for="DATE_ID"><span class="FieldInfo"><h4>DATE</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-user"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="DATE_ID" id="cellphone_number" size = 100 style="height:30px; width: 500px" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="TIMEID"><span class="FieldInfo"><h4>TIME</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="TIMEID" size = 100 style="height:30px; width: 500px" id="name" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="ODOMETER"><span class="FieldInfo"><h4>ODOMETER</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="ODOMETER" size = 100 style="height:30px; width: 500px" id="address" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="FULLTANK"><span class="FieldInfo"><h4>FULLTANK</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="FULLTANK" size = 100  style="height:30px; width: 500px" id="dlicense" value="">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="VALUE_ID"><span class="FieldInfo"><h4>VALUE</h4></span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="VALUE_ID" size = 100  style="height:30px; width: 500px" id="dlicense" value="">
                  </div>
                </div>
                <p>
                    <br><br><br>
                    <input type = "submit" name = "submit" class="btn btn-info btn-block" style="height: 500px; width: 80px; left: 250; top: 250;" value = "SIGN UP" />
                </p>
            </p>
        </div>
</form>


</body>
</html>
