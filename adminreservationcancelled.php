<?php
//require_once 'conn.php';

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT 
reservation.reservation_id,
payment.payment_id,
payment.first_payment, 
reservation.reservation_status,

payment.payment_status,
reservation.check_in, 
reservation.check_out, 
reservation.email, 
reservation.mobile_number, 
 
reservation.last_name, 
reservation.first_name, 
reservation.middle_name, 
reservation.barangay,
reservation.city, 
reservation.province, 
reservation.total_guest 
 
  FROM reservation
  INNER JOIN payment ON
  reservation.reservation_id = payment.reservation_id 
  WHERE reservation_status='Cancelled' ORDER BY reservation_id DESC
 ");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(
  $reservation_id,
  $payment_id,
  $first_payment,
  $reservation_status,
  $payment_status,
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

<!-- Table -->
<div class="table-responsive">      
  


  <table class="table">
    <!-- Header -->
    <thead>
      <tr>
      <th>Proof of Payment</th>
      <th>Payment Status</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Barangay</th>
        <th>City</th>
        <th>Province</th>
        <th>Total Guest</th>

        <th>Option</th>
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
        
       
      <img src="<?php echo htmlspecialchars($first_payment); ?>" class="img-rounded" width="80px" height="80px">
    
     
    </td><!-- data -->

     <!-- data -->
     <td>
     <?php echo htmlspecialchars($payment_status); ?>
    </td><!-- data -->

    <!-- data -->
    <td>
     <?php echo htmlspecialchars($check_in); ?>
    </td><!-- data -->

<!-- data -->
<td>
     <?php echo htmlspecialchars($check_out); ?>
    </td><!-- data -->

    <!-- data -->
    <td>
     <?php echo htmlspecialchars($email); ?>
    </td><!-- data -->

<!-- data -->
<td>
     <?php echo htmlspecialchars($mobile_number); ?>
    </td><!-- data -->

<!-- data -->
<td>
     <?php echo htmlspecialchars($last_name); ?>
    </td><!-- data -->

<!-- data -->
<td>
     <?php echo htmlspecialchars($first_name); ?>
    </td><!-- data -->

<!-- data -->
<td>
     <?php echo htmlspecialchars($middle_name); ?>
    </td><!-- data -->

<!-- data -->
<td>
     <?php echo htmlspecialchars($barangay); ?>
    </td><!-- data -->

<!-- data -->
<td>
     <?php echo htmlspecialchars($city); ?>
    </td><!-- data -->

<!-- data -->
<td>
     <?php echo htmlspecialchars($province); ?>
    </td><!-- data -->

<!-- data -->
<td>
     <?php echo htmlspecialchars($total_guest); ?>
    </td><!-- data -->
      
        <td>
        <div class="btn-group-vertical">
			<a href="adminreservationdetailscancelled.php?reservation_id=<?php echo htmlspecialchars($reservation_id); ?>" 
      class="btn btn-outline-primary btn-lg" role="button"> <span class="glyphicon glyphicon-list-alt"></span>
    </a>
      </div>
      </div>
        </td>



        
      </tr><!-- Row -->

  <?php 
  }

  // Close the statement and database connection
  $stmt->close();
  //$conn->close();
    ?>

    </tbody><!-- Body -->
  </table>
 
  </div>
  <!-- Table -->

 



  
  