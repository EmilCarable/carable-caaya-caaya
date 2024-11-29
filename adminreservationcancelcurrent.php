
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cancel Reservation </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- ####################################### SQL ############################################ -->
<?php
// Include the database configuration file
require 'conn.php';



$reservation_id=$_GET['reservation_id'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT 

reservation.facility_name,
reservation.reservation_status,

facilities.facility_image

FROM reservation
INNER JOIN facilities ON
reservation.facility_id = facilities.facility_id


WHERE reservation_status = 'Reserved' AND reservation_id = '$reservation_id'
");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(



$facility_name,
$reservation_status,

$facility_image


);


   
    //<button type="button" id="" class="btn btn-warning"  data-toggle="modal" data-target="#payment_proof"> show</button>
  
    ?>
<!-- ####################################### SQL ############################################ -->

<!-- ####################################### CONTAINER FLUID ############################################ -->
<div class="container-fluid" style="background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);">

<!-- ####################################### ROW ############################################ -->
<div class="row">
<!-- ####################################### COL ############################################ -->
    <div class="col-xs-12">

    
<!-- ####################################### JUMBOTRON ############################################ -->
<div class="jumbotron" style="background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">



<!-- ####################################### PANEL ############################################ -->
        <div class="panel panel-info" style="text-align:center; background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">

  <div class="panel-heading" style="font-weight: bold;">

  <p style="margin-bottom: 0%; font-weight:bold;">
  TUKAYO & CARABLE | Cancel Reservation
    </p>

    <a href="admin.php">
    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="RETURN" >
<span class="glyphicon glyphicon-arrow-left"></span>
</button>
</a>


<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
  Cancel Now
</button>


</div>

  <!-- panel body -->
  <div class="panel-body">

  <?php
  // Fetch and display the data
while ($stmt->fetch()) {
  // Display the data securely
  ?>

<!-- ####################################### FACILITY ############################################ -->
  <p style="text-align: center;">
        <img src="<?php echo htmlspecialchars($facility_image); ?> " alt="" class="img-rounded" height="250px"  width="250px">
		</p>

<p  style=" font-weight:bold; ">
<?php echo htmlspecialchars($facility_name); ?>
</p>


<!-- ####################################### FACILITY ############################################ -->

<!-- ####################################### RESERVATION ############################################ -->
<p  style="font-size: small; font-weight:bold; ">
Reservation Status |
<?php echo htmlspecialchars($reservation_status); ?> 

</p>

<!-- ####################################### RESERVATION ############################################ -->

<?php 
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>

<!-- ####################################### PAYMENT SQL ############################################ -->
<?php

require 'conn.php';

$reservation_id=$_GET['reservation_id'];
$payment_id=$_GET['payment_id'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT payment_status, first_payment FROM payment
WHERE reservation_id='$reservation_id'

");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(
$payment_status,
$first_payment
);

// Fetch and display the data
while ($stmt->fetch()) {
    // Display the data securely
   
    //<button type="button" id="" class="btn btn-warning"  data-toggle="modal" data-target="#payment_proof"> show</button>
  
    ?>
<!-- ####################################### PAYMENT SQL ############################################ -->

<!-- ####################################### PAYMENT ############################################ -->
<p style="text-align: center;">
        <img src="<?php echo htmlspecialchars($first_payment); ?>" alt="<?php echo htmlspecialchars($facility_image); ?>"
        class="img-rounded" height="250px"  width="250px">
		</p>

<p  style="font-size: small; font-weight:bold; ">
Payment Status |
<?php echo htmlspecialchars($payment_status); ?> 

</p>
<!-- ####################################### PAYMENT ############################################ -->



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cancel Reservation?</h4>
      </div>
      <div class="modal-body">
       
      <!-- ####################################### FORM ############################################ -->
<form action="adminreservationsql.php?reservation_id=<?php echo $reservation_id; ?>" method="POST" enctype="multipart/form-data">

<input type="text" id="reservation_status" name="reservation_status" value="Cancelled" hidden>



    <div class="btn-group">
    <button type="submit" class="btn btn-danger" name="btncancel">YES</button>
    
    </div>

</form>
<!-- ####################################### FORM ############################################ -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- Modal content-->

  </div>
</div><!-- Modal -->









<?php 
}

// Close the statement and database connection
$stmt->close();
//$conn->close();
?>

    </div>
  <!-- panel body -->

    <!-- panel footer -->
  <div class="panel-footer">
    <?php 
    require_once 'footer.php';
    ?>

</div>
<!-- panel footer -->

</div>
<!-- ####################################### PANEL ############################################ -->


</div>
<!-- ####################################### JUMBOTRON ############################################ -->

</div>
<!-- ####################################### COL ############################################ -->

</div>
<!-- ####################################### ROW ############################################ -->






</div>
<!-- ####################################### CONTAINER FLUID ############################################ -->




</body>
</html>





