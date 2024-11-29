<!DOCTYPE html>
<html lang="en">
<head>
  <title>Print Receipt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
        /* Hide the button when printing */
        @media print {
            .btn {
                display: none;
            }
        }
    </style>
</head>
<body>
<!-- ############################################################################################# -->
<!-- ####################################### SQL ############################################ -->
<?php
require 'conn.php';

$reservation_id = $_GET['reservation_id'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT * FROM reservation WHERE reservation_id='$reservation_id'");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(

  $reservation_id,
  $facility_id,
  $facility_name,
  $facility_price,
  $reservation_status,
  $check_in,
  $check_out,
  $email,
  $mobile_number,
  $last_name,
  $first_name,
  $middle_name,
  $barangay,
  $city,
  $province,
  $total_guest



);
?>
<!-- ####################################### SQL ############################################ -->
<!-- ####################################### CONTAINER ############################################ -->
<!-- Comment -->
<div class="container-fluid" style="background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);">
<!-- ####################################### JUMBOTRON ############################################ -->
<div class="jumbotron" style="background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-top:1%;">

<!-- ####################################### PANEL ############################################ -->
<div class="panel panel-info" style="text-align:center; background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">

  <!-- HEADING -->
  <div class="panel-heading">
  <p style="margin-bottom: 0%; font-weight:bold;">
    RESERVATION RECEIPT REPORT
    </p>

  

    <button type="button" class="btn btn-primary" onclick="history.back()" data-toggle="tooltip" title="RETURN">
    <span class="glyphicon glyphicon-arrow-left"></span>
</button>

    <button type="button" class="btn btn-success" onclick="window.print()" data-toggle="tooltip" title="PRINT RECEIPT">
    <span class="glyphicon glyphicon-print"></span>
</button>





</div><!-- HEADING -->

  <!-- BODY -->
  <div class="panel-body">
<!-- ####################################### RESERVATION ############################################ -->

  <?php 
    // Fetch and display the data
while ($stmt->fetch()) {
  // Display the data securely
    ?>

    <p style="text-align:left; ">
      Reservation Id: <?php echo htmlspecialchars($reservation_id); ?> <br>

      Name: <?php echo htmlspecialchars($first_name); ?> <?php echo htmlspecialchars($middle_name); ?> <?php echo htmlspecialchars($last_name); ?> <br>
    
      Email: <?php echo htmlspecialchars($email); ?> <br>

      Mobile Number: <?php echo htmlspecialchars($mobile_number); ?>
    </p>

   

    

 <!-- TABLE RESPONSIVE-->
<div class="table-responsive" style="text-align: justify;">
 <!-- TABLE -->
<table class="table">

<thead>
    <tr>
        <th>Date of Check In</th>
        <th>Date of Check Out</th>
        
      
        <th>Barangay</th>
        <th>City</th>
        <th>Province</th>
        <th>Total Guest</th>
    </tr>
</thead>

<tbody>
  <tr>
    <td><?php echo htmlspecialchars($check_in); ?></td>
    <td><?php echo htmlspecialchars($check_out); ?></td>
    
  
    <td><?php echo htmlspecialchars($barangay); ?></td>
    <td><?php echo htmlspecialchars($city); ?></td>
    <td><?php echo htmlspecialchars($province); ?></td>
    <td><?php echo htmlspecialchars($total_guest); ?></td>
  </tr>
</tbody>

</table> <!-- TABLE -->
</div> <!-- TABLE RESPONSIVE-->

<?php 
  }

  // Close the statement and database connection
  $stmt->close();
  $conn->close();
    ?>
<!-- ####################################### RESERVATION ############################################ -->



<!-- ####################################### PAYMENT ############################################ -->
<!-- SQL -->
<?php
require 'conn.php';

$reservation_id = $_GET['reservation_id'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT * FROM payment WHERE reservation_id='$reservation_id'");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(

  $payment_id,
  $reservation_id,
  $payment_status,
  $first_payment,
  $second_payment,
  $total_bills,
  $reservation_fee,
  $remaining_balance

);
?>
<!-- SQL -->



<!-- TABLE RESPONSIVE-->
<div class="table-responsive" style="text-align: justify;">
 <!-- TABLE -->
<table class="table">

<thead>
    <tr>
      <th>Payment Id</th>
      <th>Payment Status</th>
        <th>Total Bills</th>
        <th>Reservation Fee</th>
        <th>Remaining Balance</th>
       
    </tr>
</thead>

<tbody>

<?php 
    // Fetch and display the data
while ($stmt->fetch()) {
  // Display the data securely
    ?>

  <tr>
    <td><?php echo htmlspecialchars($payment_id); ?></td>
    <td><?php echo htmlspecialchars($payment_status); ?></td>
    <td><?php echo htmlspecialchars($total_bills); ?></td>
    <td><?php echo htmlspecialchars($reservation_fee); ?></td>
    <td><?php echo htmlspecialchars($remaining_balance); ?></td>
   
  </tr>
</tbody>

</table> <!-- TABLE -->
</div> <!-- TABLE RESPONSIVE-->



<!-- ####################################### PAYMENT ############################################ -->

<?php 
  }

  // Close the statement and database connection
  $stmt->close();
  $conn->close();
    ?>

  </div><!-- BODY -->

  <!-- FOOTER -->
  <div class="panel-footer">
   <p style="margin-bottom:0%;">
    <span class="glyphicon glyphicon-copyright-mark">
   
    </span>
    2023
    </p>
  

  </div><!-- FOOTER -->

</div>
<!-- ####################################### PANEL ############################################ -->

</div>
<!-- ####################################### JUMBOTRON ############################################ -->
</div>
<!-- ####################################### CONTAINER ############################################ -->
<!-- ############################################################################################# -->
</body>
</html>