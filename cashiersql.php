<?php
require_once 'conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';



// #############################_CASHIER SQL_############################## //
// APPROVE PAYMENT //
if (isset($_POST['btnapprove'])) {

    $payment_id = $_GET['payment_id'];

    $reservation_fee = $_POST["reservation_fee"];

    $payment_status = $_POST["payment_status"];

    $total_bills = $_POST["total_bills"];

    $remaining_balance = $total_bills - $reservation_fee;
  
   
  
    $sql1 = "UPDATE `payment` SET reservation_fee='$reservation_fee', payment_status='$payment_status', remaining_balance='$remaining_balance'
    WHERE payment_id='$payment_id'";
  
  if ($conn->query($sql1) === TRUE) {

    $reservation_id = $_GET['reservation_id'];

    $reservation_status = $_POST['reservation_status'];

    $sql2 = "UPDATE `reservation` SET reservation_status='$reservation_status'
    WHERE reservation_id='$reservation_id'";


   
   if ($conn->query($sql2) === TRUE) {

    $payment_id = $_GET['payment_id'];
    
// Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT 
    
reservation.reservation_id, 
reservation.facility_name, 
reservation.reservation_status,
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
reservation.total_guest,

payment.payment_status,
payment.total_bills,
payment.reservation_fee,
Payment.remaining_balance
 
  FROM reservation
  INNER JOIN payment ON
  reservation.reservation_id = payment.reservation_id
  WHERE payment_id = '$payment_id'
    
    ");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(

  $reservation_id,
  $facility_name,
  $reservation_status,
  $check_in,
  $check_out,
  $email,
  $mobile_number,
  $last_name,
  $first_name,
  $middle_name,
  $brangay,
  $city,
  $province,
  $total_guest,

  $payment_status,
  $total_bills,
  $reservation_fee,
  $remaining_balance




);

  // Fetch and display the data
  while ($stmt->fetch()) {

  // Display the data securely
$message = "<h3>"."Dear Valued Customer,<br>Your Reservation has been Successfully Booked. Thankyou For Trusting Us. We're Happy To Serve You.
<br><br>Reservation Details<br>"."<Table>".
"<tr><td>Reservation Id:</td><td>".htmlspecialchars($reservation_id)."</td></tr>".
"<tr><td>Facility Name:</td><td>".htmlspecialchars($facility_name)."</td></tr>".
"<tr><td>Reservation Status:</td><td>".htmlspecialchars($reservation_status)."</td></tr>".
"<tr><td>Check In:</td><td>".htmlspecialchars($check_in)."</td></tr>".
"<tr><td>Check Out:</td><td>".htmlspecialchars($check_out)."</td></tr>".
"<tr><td>Email:</td><td>".htmlspecialchars($email)."</td></tr>".
"<tr><td>Mobile Number:</td><td>".htmlspecialchars($mobile_number)."</td></tr>".
"<tr><td>Last Name:</td><td>".htmlspecialchars($last_name)."</td></tr>".
"<tr><td>First Name:</td><td>".htmlspecialchars($first_name)."</td></tr>".
"<tr><td>Middle Name:</td><td>".htmlspecialchars($middle_name)."</td></tr>".
"<tr><td>Barangay:</td><td>".htmlspecialchars($brangay)."</td></tr>".
"<tr><td>City:</td><td>".htmlspecialchars($city)."</td></tr>".
"<tr><td>Province:</td><td>".htmlspecialchars($province)."</td></tr>".
"<tr><td>Total Guest:</td><td>".htmlspecialchars($total_guest)."</td></tr>".
"<tr><td>Payment Status:</td><td>".htmlspecialchars($payment_status)."</td></tr>".
"<tr><td>Total Bills:</td><td>".htmlspecialchars($total_bills)."</td></tr>".
"<tr><td>Reservation Fee:</td><td>".htmlspecialchars($reservation_fee)."</td></tr>".
"<tr><td>Remaining Balance:</td><td>".htmlspecialchars($remaining_balance)."</td></tr>".
"</table></h3>";




// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// Enable SMTP debugging (optional)
$mail->SMTPDebug = SMTP::DEBUG_OFF;  // Set to SMTP::DEBUG_SERVER for detailed debug output

$mail->isSMTP();  // Use SMTP
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Username = 'uresu0350@gmail.com';  // Your Gmail email address
$mail->Password = 'rcpdyvggpqovrvbc';  // Your Gmail password

$mail->setFrom('uresu0350@example.com', 'BRORS');
$mail->addAddress(htmlspecialchars($email), 'Recipient Name');
$mail->Subject = 'Successful Reservation';

$mail->isHTML(true);
$mail->Body = $message;





  }

if ($mail->send()) {

  header("location: cashier.php");

  return;

} else {

  $php_errormsg = $mail->ErrorInfo;

  header("location: error.php?msg=$php_errormsg");

}


  } else {
    header("location: error.php");
  }
  } else {
    header("location: error.php");
  }

}
// APPROVE PAYMENT //

// CANCEL RESERVATION //
if (isset($_POST['btncancel'])) {

  $reservation_id = $_GET['reservation_id'];
  $reservation_status = $_POST["reservation_status"];


  $sql = "UPDATE `reservation` SET reservation_status='$reservation_status'
  WHERE reservation_id='$reservation_id'";

if ($conn->query($sql) === TRUE) {

  header("location: cashier.php");
  
return;

} else {
  header("location: error.php");
}
}
// CANCEL RESERVATION //

// #############################_CASHIER SQL_############################## //
?>