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
        $stmt = $conn->prepare("SELECT *
        FROM facilities
          WHERE facility_status = 'Available' AND facility_id NOT IN (
          SELECT facility_id FROM reservation
          WHERE reservation_status BETWEEN 'Pending' AND 'Reserved' AND check_in <= $datemax AND check_out >= $datemin
          )
 ");
        $stmt->execute();

        // Bind the result variables
        $stmt->bind_result(

            $facility_id,
            $facility_image,
            $facility_status,
            $facility_name,
            $facility_type,
            $facility_capacity,
            $facility_price,
            $img_1,
            $img_2,
            $img_3,
            $img_4


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
                            AVAILABLE FACILITY REPORT
                        </p>
                        FROM: <?php echo $dmin; ?> TO: <?php echo $dmax; ?> <br>

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
                                        <th>Facility Type</th>
                                        <th>Facility Capacity</th>
                                        <th>Facility Price</th>




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
                                                <?php echo htmlspecialchars($facility_type);   ?>
                                            </td><!-- data -->

                                            <!-- data -->
                                            <td>
                                                <?php echo htmlspecialchars($facility_capacity);   ?>
                                            </td>
                                            <!-- data -->

                                            <!-- data -->
                                            <td>
                                                <?php echo htmlspecialchars($facility_price);   ?>
                                            </td>
                                            <!-- data -->


                                        </tr><!-- Row -->

                                <?php


                                    }
                                }



                                // Close the statement and database connection
                                $stmt->close();
                                //$conn->close();
                                ?>

                                <?php

                                // Prepare and execute the SQL statement
                                $stmt = $conn->prepare("SELECT COUNT(*)
                                FROM facilities
                                  WHERE facility_status = 'Available' AND facility_id NOT IN (
                                  SELECT facility_id FROM reservation
                                  WHERE reservation_status BETWEEN 'Pending' AND 'Reserved' AND check_in <= $datemax AND check_out >= $datemin
                                  )
 ");
                                $stmt->execute();

                                // Bind the result variables
                                $stmt->bind_result(


                                    $facility_id

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
                            Total Facility:

                            <?php echo htmlspecialchars($facility_id);  ?>


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
                    <div class="panel-footer">TUKAYO & CARABLE</div><!-- FOOTER -->

                </div>
                <!-- ####################################### PANEL ############################################ -->

            </div>
            <!-- ####################################### JUMBOTRON ############################################ -->
        </div>
        <!-- ####################################### CONTAINER ############################################ -->
        <!-- ############################################################################################# -->
</body>

</html>