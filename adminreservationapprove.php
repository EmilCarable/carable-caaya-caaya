
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Approve Payment</title>
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
require_once 'conn.php';

$payment_id=$_GET['payment_id'];

$reservation_id=$_GET['reservation_id'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT first_payment, total_bills FROM payment WHERE payment_id='$payment_id' ");
$stmt->execute();

// Bind the result variables
$stmt->bind_result($first_payment, $total_bills);

// Fetch and display the data
while ($stmt->fetch()) {
    // Display the data securely
   
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
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-top:1%;">



<!-- ####################################### PANEL ############################################ -->
        <div class="panel panel-info" style="text-align:center; background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">

  <div class="panel-heading" style="font-weight: bold;">

  <p style="margin-bottom: 0%; font-weight:bold;">
    TUKAYO & CARABLE | Proof of Payment
    </p>

    <a href="admin.php">
    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="RETURN" >
<span class="glyphicon glyphicon-arrow-left"></span>
</button>
</a>

</div>

  <!-- panel body -->
  <div class="panel-body">

  
  <p style="text-align: center;">
        <img src="<?php echo htmlspecialchars($first_payment); ?>" alt="<?php echo htmlspecialchars($first_payment); ?>"
        class="img-rounded" height="250px"  width="250px">
		</p>


<!-- ####################################### FORM ############################################ -->
<form action="adminreservationsql.php?payment_id=<?php echo $payment_id; ?> && reservation_id=<?php echo $reservation_id; ?>" method="POST" enctype="multipart/form-data">

<input type="text" id="reservation_status" name="reservation_status" value="Reserved" hidden>

<input type="number" id="total_bills" name="total_bills" value="<?php echo htmlspecialchars($total_bills); ?>" hidden>

<!-- amount -->
<div class="form-group-row">

<div class="col-xs-4"></div>

      
      <div class="col-xs-4">
      <label for="reservation_fee">Amount:</label> 
      <input type="number" class="form-control text-center " id="reservation_fee" name="reservation_fee" 
      placeholder="Enter Amount" required>
      </div>

      <div class="col-xs-4"></div>

    </div>
    <!-- amount--> 

<br> <br> <br> <br>
    <div class="form-group-row">
<span>Status |</span>

<label class="radio-inline">
      <input type="radio"  name="payment_status" value="Paid" required>Paid
    </label>

    <label class="radio-inline">
      <input type="radio"  name="payment_status" value="Full Paid" required>Full Paid
    </label>

    </div>
<br>


    <div class="btn-group">
    <button type="submit" class="btn btn-warning" name="btnapprove">Approve Payment</button>
    
    </div>

</form>
<!-- ####################################### FORM ############################################ -->


    </div>
  <!-- panel body -->

    <!-- panel footer -->
  <div class="panel-footer">
    <?php 
    include 'footer.php';
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



<!-- ####################################### MODAL ############################################ -->
<div id="payment_proof" class="modal fade" role="dialog">
  <!-- Modal dialog-->
  <div class="modal-dialog">

   
  


    <!-- Modal content-->
    <div class="modal-content">
      <!-- Modal content header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;"> Proof of Payment</span></h4>
      </div><!-- Modal content header-->

      <!-- Modal content body-->
      <div class="modal-body">
		<p style="text-align: center;">
        <img src="<?php echo htmlspecialchars($first_payment); ?>" alt="<?php echo htmlspecialchars($first_payment); ?>"  width="100%">
		</p>
      </div><!-- Modal content body-->

      <!-- Modal content footer-->
      <div class="modal-footer" style="text-align: center;">
<!-- Modal content-->
<form action="cashiersql.php" method="POST" enctype="multipart/form-data">

<!-- amount -->
<div class="form-group">
      <label for="reservation_fee">Amount:</label> 
      <div class="col-xs">
      <input type="number" class="form-control text-center" id="reservation_fee" name="reservation_fee" 
      placeholder="Enter Amount" required>
      </div>
    </div>
    <!-- amount-->

<span>Select Status | </span>

<label class="radio-inline">
      <input type="radio"  name="payment_status" value="Paid" required>Paid
    </label>

    <label class="radio-inline">
      <input type="radio"  name="payment_status" value="Full Paid" required>Full Paid
    </label>

    
<br><br>


    <div class="btn-group">
    <button type="submit" class="btn btn-warning">Approve Payment</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

</form>


<!-- Modal content-->


      
        
      </div><!-- Modal content footer-->

    </div><!-- Modal content-->
  </div><!-- Modal dialog-->
</div>
<!-- ####################################### MODAL ############################################ -->


</div>
<!-- ####################################### CONTAINER FLUID ############################################ -->

<?php 
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>


</body>
</html>





