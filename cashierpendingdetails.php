<!DOCTYPE html>
<html lang="en">

<head>
        <title>Reservation Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
        <!-- ############################################################################################# -->
        <!-- ####################################### SQL ############################################ -->
        <?php
        require_once 'conn.php';

        $reservation_id = $_GET['reservation_id'];

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("SELECT 

reservation.reservation_id,
reservation.facility_id,
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

facilities.facility_image

FROM reservation 

INNER JOIN facilities ON

reservation.facility_id = facilities.facility_id

WHERE reservation_id='$reservation_id'

 ");
        $stmt->execute();

        // Bind the result variables
        $stmt->bind_result(
                $reservation_id,
                $facility_id,
                $facility_name,
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
                $total_guest,

                $facility_image


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
                                                Reservation Details
                                        </p>

                                      

                                                <a href="cashier.php" class="btn btn-primary" data-toggle="tooltip" title="RETURN">
                                                        <span class="glyphicon glyphicon-arrow-left"></span>
                                                </a>

                                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModalApprove">
                                                        <span class="glyphicon glyphicon-ok-circle"></span>
                                                </a>

                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModalCancel">
                                                        <span class="glyphicon glyphicon-remove-circle"></span>
                                                </a>

                                      


                                </div><!-- HEADING -->

                                <!-- BODY -->
                                <div class="panel-body">

                                        <?php
                                        // Fetch and display the data
                                        while ($stmt->fetch()) {
                                                // Display the data securely
                                        ?>

                                                <!-- Modal Reservation Invalid -->
                                                <div id="myModalCancel" class="modal fade" role="dialog">
                                                        <div class="modal-dialog modal-sm">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                        <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Ivalid Payment</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                Disapprove Reservation?

                                                                                <!-- FORM -->
                                                                                <form class="form-inline" action="cashierreservationsql.php?reservation_id=<?php echo htmlspecialchars($reservation_id); ?>" method="POST" enctype="multipart/form-data">

                                                                                        <input type="text" id="reservation_status" name="reservation_status" value="Invalid" hidden>

                                                                                        <input type="text" id="payment_status" name="payment_status" value="Invalid Payment" hidden>

                                                                                        <button type="submit" class="btn btn-warning" id="btnreservationinvalid" name="btnreservationinvalid" data-toggle="tooltip" title="*Onced proccessed, cannot be undone">YES</button>
                                                                                </form>
                                                                                <!-- FORM -->

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                </div><!-- Modal Reservation Invalid -->

                                                <p style="background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">

                                                        <?php echo htmlspecialchars($facility_name); ?>

                                                </p>

                                                <!-- ROW -->
                                                <div class="row">


                                                        <div class="col-xs-12">
                                                                <img src="<?php echo htmlspecialchars($facility_image); ?>" alt="" class="img-responsive" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 1% 10%;">

                                                        </div>


                                                </div>
                                                <!-- ROW -->

                                                <br>





                                                <!-- ROW -->
                                                <div class="row">

                                                        <!-- RESERVATION DETAILS -->
                                                        <div class="col-xs-6">

                                                                <p style="background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">

                                                                        Reservation

                                                                </p>

                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($reservation_id); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Reservaton ID :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($facility_id); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Facility Id :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($reservation_status); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Reservation Status :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($check_in); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Check In :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($check_out); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Check Out :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($email); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Email :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($mobile_number); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Mobile Number :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($last_name); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Last Name :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($first_name); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        First Name :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($middle_name); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Middle Name :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($barangay); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Barangay :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($city); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        City :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($province); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Province :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($total_guest); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Total Guest :
                                                                </p>


                                                        </div>
                                                        <!-- RESERVATION DETAILS -->
                                                <?php
                                        }

                                        // Close the statement and database connection
                                        $stmt->close();
                                        //$conn->close();
                                                ?>





                                                <!-- ####################################### SQL ############################################ -->
                                                <?php
                                                require_once 'conn.php';

                                                $reservation_id = $_GET['reservation_id'];

                                                // Prepare and execute the SQL statement
                                                $stmt = $conn->prepare("SELECT 

* FROM payment

WHERE reservation_id='$reservation_id'

 ");
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
                                                <!-- ####################################### SQL ############################################ -->

                                                <!-- PAYMENT DETAILS -->
                                                <div class="col-xs-6">

                                                        <?php
                                                        // Fetch and display the data
                                                        while ($stmt->fetch()) {
                                                                // Display the data securely
                                                        ?>


                                                                <!-- Modal Reservation Approve -->
                                                                <div id="myModalApprove" class="modal fade" role="dialog">
                                                                        <div class="modal-dialog modal-lg">

                                                                                <!-- Modal content-->
                                                                                <div class="modal-content" style="text-align:center; background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);">
                                                                                        <div class="modal-header">
                                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                <div class="modal-title">
                                                                                                        <p style="margin: 0%; font-weight: bold; ">
                                                                                                                GCASH | Proof of Payment
                                                                                                        </p>
                                                                                                </div>
                                                                                        </div>


                                                                                        <div class="modal-body">

                                                                                                <div class="alert-info" style="margin: 0%; border-radius: 10px;">

                                                                                                        Total Amount Due: <?php echo htmlspecialchars($total_bills); ?> |
                                                                                                        Reservation Fee: <?php
                                                                                                                                $fee = ($total_bills * 0.5);
                                                                                                                                echo $fee;
                                                                                                                                ?>

                                                                                                </div><br>

                                                                                                <p style="text-align: center;">
                                                                                                        <img src="<?php echo htmlspecialchars($first_payment); ?>" alt="<?php echo htmlspecialchars($first_payment); ?>" class="img-rounded" height="250px" width="250px">
                                                                                                </p>


                                                                                                <!-- ####################################### FORM ############################################ -->
                                                                                                <form action="cashierreservationsql.php?payment_id=<?php echo $payment_id; ?>&&reservation_id=<?php echo $reservation_id; ?>" method="POST" enctype="multipart/form-data">



                                                                                                        <input type="number" id="total_bills" name="total_bills" value="<?php echo htmlspecialchars($total_bills); ?>" hidden>

                                                                                                        <!-- amount -->
                                                                                                        <div class="form-group-row">

                                                                                                                <div class="col-xs-4"></div>


                                                                                                                <div class="col-xs-4">
                                                                                                                        <label for="reservation_fee">Amount:</label>
                                                                                                                        <input type="number" class="form-control text-center " id="reservation_fee" name="reservation_fee" placeholder="Enter Amount" required>
                                                                                                                </div>

                                                                                                                <div class="col-xs-4"></div>

                                                                                                        </div>
                                                                                                        <!-- amount-->

                                                                                                        <br> <br> <br> <br>
                                                                                                        <div class="form-group-row">
                                                                                                                <span>Status:</span> <br>

                                                                                                                <label class="radio-inline">
                                                                                                                        <input type="radio" name="payment_status" value="Paid" required>Paid <br>
                                                                                                                        <input type="radio" name="payment_status" value="Full Paid" required>Full Paid
                                                                                                                </label>



                                                                                                        </div>
                                                                                                        <br>


                                                                                                        <div class="btn-group">
                                                                                                                <button type="submit" class="btn btn-success" name="btnapprove">Approve Payment</button>

                                                                                                        </div>

                                                                                                </form>
                                                                                                <!-- ####################################### FORM ############################################ -->

                                                                                        </div>


                                                                                        <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                </div>

                                                                        </div>
                                                                </div><!-- Modal Reservation Approve -->


                                                                <p style="background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">

                                                                        Payment

                                                                </p>


                                                                <img src="<?php echo htmlspecialchars($first_payment); ?>" alt="" class="img-responsive " style="border-radius:1% 10%;">
                                                                <img src="<?php echo htmlspecialchars($second_payment); ?>" alt="" class="img-responsive " style="border-radius:1% 10%;">

                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Proof of Payment :
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($payment_id); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Payment Id:
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($payment_status); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Payment Status:
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($total_bills); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Total Bills:
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($reservation_fee); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Reservation Fee:
                                                                </p>


                                                                <div class="alert-success">
                                                                        <?php echo htmlspecialchars($remaining_balance); ?>
                                                                </div>
                                                                <p style="font-size: small; font-weight:bold; text-align:left;
background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">
                                                                        Remaining Balance:
                                                                </p>











                                                        <?php
                                                        }

                                                        // Close the statement and database connection
                                                        $stmt->close();
                                                        $conn->close();
                                                        ?>
                                                </div>
                                                <!-- PAYMENT DETAILS -->


                                                </div>
                                                <!-- ROW -->














                                </div><!-- BODY -->

                                <!-- FOOTER -->
                                <div class="panel-footer">TOKAYO AND EMIL</div><!-- FOOTER -->

                        </div>
                        <!-- ####################################### PANEL ############################################ -->

                </div>
                <!-- ####################################### JUMBOTRON ############################################ -->
        </div>
        <!-- ####################################### CONTAINER ############################################ -->
        <!-- ############################################################################################# -->
</body>

</html>