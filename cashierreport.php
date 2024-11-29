<!DOCTYPE html>
<html lang="en">
<head>
  <title>Report</title>
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
require_once 'conn.php';


if (isset($_POST['btnreport'])) {

$datemin = $_POST['datemin'];
$datemax = $_POST['datemax'];



$dmin = date('F-d-Y', strtotime($datemin));
$dmax = date('F-d-Y', strtotime($datemax));


// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT

reservation.facility_name,
reservation.check_in,
reservation.check_out,
reservation.first_name,
reservation.middle_name,
reservation.last_name,
reservation.total_guest,

payment.reservation_fee

FROM reservation
INNER JOIN payment ON
reservation.reservation_id = payment.reservation_id 
WHERE check_in BETWEEN '$datemin' AND  '$datemax'

 ");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(

  $facility_name,
  $check_in,
  $check_out,
  $first_name,
  $middle_name,
  $last_name,
  $total_guest,
  $reservation_fee


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
    RESERVATION SUMMARY REPORT
    </p>
    FROM: <?php echo $dmin; ?> TO:  <?php echo $dmax; ?> <br>

    <button type="button" class="btn btn-primary " data-toggle="tooltip" title="RETURN" onclick="history.back()">
    <span class="glyphicon glyphicon-arrow-left"></span>
    </button>
  </div><!-- HEADING -->

  <!-- BODY -->
  <div class="panel-body" style="text-align: justify;">
    
<!-- Table -->
<div class="table-responsive">      
  


  <table class="table">
    <!-- Header -->
    <thead>
      <tr>
      <th>Facility Name</th>
      <th>Check In</th>
      <th>Check Out</th>
      <th>Full Name</th>
      <th>Total Guest</th>
      <th>Payment</th>
        

       
      </tr>
    </thead><!-- Header -->
    

    <!-- Body -->
    <tbody>

    <?php 
    // Fetch and display the data
while ($stmt->fetch()) {

    
  // Display the data securely
    ?>
  
      <!-- Row -->
      <tr>


     <!-- data -->
     <td>
     <?php echo htmlspecialchars($facility_name);   ?>
    </td><!-- data -->

    <!-- data -->
    <td>
    <?php echo htmlspecialchars($check_in);   ?>
    </td><!-- data -->

<!-- data -->
        <td>
        <?php echo htmlspecialchars($check_out);   ?>
        </td>
<!-- data -->

<!-- data -->
<td>
        <?php 
        echo htmlspecialchars($first_name). " " ; 
        echo htmlspecialchars($middle_name). " " ;
        echo htmlspecialchars($last_name);
        
        ?>
        </td>
<!-- data -->

<!-- data -->
<td>
        <?php echo htmlspecialchars($total_guest);   ?>
        </td>
<!-- data -->

<!-- data -->
<td>
        <?php echo htmlspecialchars($reservation_fee);   ?>
        </td>
<!-- data -->
        
      </tr><!-- Row -->

  <?php 


  }}

  

  // Close the statement and database connection
  $stmt->close();
  //$conn->close();
    ?>

    <?php 

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT

SUM(payment.reservation_fee)

FROM reservation
INNER JOIN payment ON
reservation.reservation_id = payment.reservation_id 
WHERE check_in BETWEEN '$datemin' AND  '$datemax'

 ");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(

 
  $reservation_fee

);

 // Fetch and display the data
 while ($stmt->fetch()) {

    
 


?>





    </tbody><!-- Body -->
  </table>
 
  </div>
  <!-- Table -->

  <?php 
   // Display the data securely

 

   ?>

<p style="text-align: right; margin-right: 8%; font-weight:bold;">
Total Payment:

  <?php   echo htmlspecialchars($reservation_fee);  ?>


</p>

<?php
  }
  
  // Close the statement and database connection
  $stmt->close();
  //$conn->close();
  ?>

  <button type="button" class="btn btn-success center-block" onclick="window.print()">PRINT REPORT</button>


  </div><!-- BODY -->

  <!-- FOOTER -->
  <div class="panel-footer">BRORS</div><!-- FOOTER -->

</div>
<!-- ####################################### PANEL ############################################ -->

</div>
<!-- ####################################### JUMBOTRON ############################################ -->
</div>
<!-- ####################################### CONTAINER ############################################ -->
<!-- ############################################################################################# -->
</body>
</html>

































  








  
  