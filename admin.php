<?php
require 'verify.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
  <!-- ############################################################################################# -->
  <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <!-- CONTAINER -->
  <div class="container-fluid">

    <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ROW -->
    <div class="row">
      <div class="col-xs-12">
        <?php
        require 'adminnavbar.php';
        ?>
      </div>
    </div>
    <!-- ROW -->
    <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <br><br><br>
    <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ROW -->
    <div class="row">
      <!-- COL -->
      <div class="col-xs-12">

        <!-- MODAL -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content" style="text-align: center;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reservation & Payment Report</h4>
              </div>

              <div class="modal-body">

                <!-- FORM -->
                <form class="form-horizontal" action="adminreport.php" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="control-label col-sm-4" for="datemin">Date From:</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="datemin" name="datemin" placeholder="Enter email">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-4" for="datemax">Date To:</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="datemax" name="datemax" placeholder="Enter password">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" id="btnreport" name="btnreport" class="btn btn-default">Generate Report</button>
                    </div>
                  </div>
                </form>
                <!-- FORM -->

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- Modal content-->

          </div>
        </div>
        <!-- MODAL -->


        <!-- MODAL -->
        <div id="myModalFacility" class="modal fade" role="dialog">
          <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content" style="text-align: center;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Available Facility Report</h4>
              </div>

              <div class="modal-body">

                <!-- FORM -->
                <form class="form-horizontal" action="adminreportfacility.php" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="control-label col-sm-4" for="datemin">Date From:</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="datemin" name="datemin" placeholder="Enter email">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-4" for="datemax">Date To:</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="datemax" name="datemax" placeholder="Enter password">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" id="btnreport" name="btnreport" class="btn btn-default">Generate Report</button>
                    </div>
                  </div>
                </form>
                <!-- FORM -->

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- Modal content-->

          </div>
        </div>
        <!-- MODAL -->


        <span class="h4" style="font-weight: bold; ">Dashboard</span>




        <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- JUMBOTRON ACCORDION -->
        <div class="panel-group" id="accordion">

          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
          <!-- group1 -->
          <div class="panel panel-default" style="box-shadow: 10px 10px; ">
            <!-- heading -->
            <div class="panel-heading">
              <!-- title -->
              <div class="panel-title">

                <span style="float: right;">
                  <a class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse1"> More Info </a>
                </span>

                <span class="h3">
                  Reservation
                </span><br>

                <!-- reservation count -->
                <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <?php

                $sql = "SELECT * FROM reservation";
                $result = ($conn->query($sql));
                //declare array to store the data of database
                $row = [];

                if ($result->num_rows >= 0) {
                  // fetch all data from db into array
                  $row = $result->fetch_all(MYSQLI_ASSOC);

                  $count = $result->num_rows;

                ?>
                  <span>
                    Total Reservation <span class="badge"><?php echo $count; ?></span>
                  </span><?php }  ?>|
                  <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                  <!-- reservation count -->

                  <!-- reservation pending -->
                  <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                  <?php

                  $sql = "SELECT * FROM reservation WHERE reservation_status='Pending'";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    <span>
                      Pending Reservation <span class="badge"><?php echo $count; ?></span>
                    </span><?php }  ?>|
                    <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <!-- reservation pending -->

                    <!-- reservation current -->
                    <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                    <?php

                    $sql = "SELECT * FROM reservation WHERE reservation_status='Reserved'";
                    $result = ($conn->query($sql));
                    //declare array to store the data of database
                    $row = [];

                    if ($result->num_rows >= 0) {
                      // fetch all data from db into array
                      $row = $result->fetch_all(MYSQLI_ASSOC);

                      $count = $result->num_rows;

                    ?>
                      <span>
                        Current Reservation <span class="badge"><?php echo $count; ?></span>
                      </span><?php }  ?>|
                      <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                      <!-- reservation current -->

                      <!-- reservation cancelled -->
                      <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                      <?php

                      $sql = "SELECT * FROM reservation WHERE reservation_status='Cancelled'";
                      $result = ($conn->query($sql));
                      //declare array to store the data of database
                      $row = [];

                      if ($result->num_rows >= 0) {
                        // fetch all data from db into array
                        $row = $result->fetch_all(MYSQLI_ASSOC);

                        $count = $result->num_rows;

                      ?>
                        <span>
                          Cancelled Reservation <span class="badge"><?php echo $count; ?></span>
                        </span><?php }  ?>
                      <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                      <!-- reservation cancelled -->

                      <!-- reservation fnished -->
                      <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                      <?php

                      $sql = "SELECT * FROM reservation WHERE reservation_status='Finished'";
                      $result = ($conn->query($sql));
                      //declare array to store the data of database
                      $row = [];

                      if ($result->num_rows >= 0) {
                        // fetch all data from db into array
                        $row = $result->fetch_all(MYSQLI_ASSOC);

                        $count = $result->num_rows;

                      ?>
                        <span>
                          Finished Reservation <span class="badge"><?php echo $count; ?></span>
                        </span><?php }  ?>
                      <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                      <!-- reservation fnished -->

              </div>
              <!-- title -->
            </div>
            <!-- heading -->


            <!-- collapse1 -->
            <div id="collapse1" class="panel-collapse collapse">

              <!-- body -->
              <div class="panel-body">

                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Pending Reservation</a></li>
                  <li><a data-toggle="tab" href="#menu1">Current Reservation</a></li>
                  <li><a data-toggle="tab" href="#menu2">Cancelled Reservation</a></li>
                  <li><a data-toggle="tab" href="#menu3">Finished Reservation</a></li>
                </ul>

                <div class="tab-content">

                  <div id="home" class="tab-pane fade in active">
                    <?php
                    require 'adminreservationpending.php';
                    ?>
                  </div>

                  <div id="menu1" class="tab-pane fade">
                    <?php
                    require 'adminreservationcurrent.php';
                    ?>
                  </div>

                  <div id="menu2" class="tab-pane fade">
                    <?php
                    require 'adminreservationcancelled.php';
                    ?>
                  </div>

                  <div id="menu3" class="tab-pane fade">
                    <?php
                    require 'adminreservationfinished.php';
                    ?>
                  </div>


                </div>

              </div>
              <!-- body -->

            </div>
            <!-- collapse1 -->

          </div>
          <!-- group1 -->
          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

          <br><br>

          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
          <!-- group2 -->
          <div class="panel panel-default" style="box-shadow: 10px 10px; ">
            <!-- panel heading -->
            <div class="panel-heading">
              <!-- panel title -->
              <div class="panel-title">

                <span style="float: right;">
                  <a class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse2"> More Info </a>
                </span>

                <span class="h3">
                  Facilities
                </span><br>

                <span>
                  <!-- faciities count -->
                  <?php

                  $sql = "SELECT * FROM facilities";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    Total Facility <span class="badge"><?php echo $count; ?></span>
                  <?php } ?>
                  <!-- faciities count -->
                </span>

                <a href="adminfacilityadd.php">| Add Facility <span class="glyphicon glyphicon-plus"></span></a>

              </div>
              <!-- panel title -->
            </div>
            <!-- panel heading -->

            <!-- content -->
            <div id="collapse2" class="panel-collapse collapse">
              <!-- panel body -->
              <div class="panel-body">

                <!-- nav tab -->
                <ul class="nav nav-tabs">

                  <!-- rooms count -->
                  <?php

                  $sql = "SELECT * FROM facilities WHERE facility_type='Room'";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    <li class="active"><a data-toggle="tab" href="#home2">Rooms <span class="badge"><?php echo $count; ?></span></a></li>
                  <?php }  ?>
                  <!-- rooms count -->

                  <!-- cottage count -->
                  <?php

                  $sql = "SELECT * FROM facilities WHERE facility_type='Cottage'";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    <li><a data-toggle="tab" href="#menu11">Cottages <span class="badge"><?php echo $count; ?></span></a></li>
                  <?php }  ?>
                  <!-- cottage count -->

                  <!-- venue count -->
                  <?php

                  $sql = "SELECT * FROM facilities WHERE facility_type='Venue'";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    <li><a data-toggle="tab" href="#menu22">Venues <span class="badge"><?php echo $count; ?></span></a></li>
                  <?php } ?>
                  <!-- venue count -->

                  <!-- rooms count -->
                  <?php

                  $sql = "SELECT * FROM facilities ";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    <li><a data-toggle="tab" href="#menu33">Search <span class="badge"><?php echo $count; ?></span></a></li>
                  <?php } ?>
                  <!-- rooms count -->



                </ul>




                <!-- nav tab -->


                <!-- nav tab content -->
                <div class="tab-content">

                  <!-- nav tab content rooms -->
                  <div id="home2" class="tab-pane fade in active">
                    <?php
                    require 'adminfacilityrooms.php';
                    ?>
                  </div>
                  <!-- nav tab content rooms -->

                  <!-- nav tab content cottages -->
                  <div id="menu11" class="tab-pane fade">
                    <?php
                    require 'adminfacilitycottages.php';
                    ?>
                  </div>
                  <!-- nav tab content cottages -->

                  <!-- nav tab content venues -->
                  <div id="menu22" class="tab-pane fade">
                    <?php
                    require 'adminfacilityvenues.php';
                    ?>
                  </div>
                  <!-- nav tab content venues -->

                  <!-- nav tab content search -->
                  <div id="menu33" class="tab-pane fade">
                    <?php
                    require 'adminsearch.php';
                    ?>
                  </div>
                  <!-- nav tab content search -->

                </div>
                <!-- nav tab content -->

              </div>
              <!-- panel body -->
            </div>
            <!-- content -->

          </div>
          <!-- group2 Facilities -->
          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

          <br><br>

          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
          <!-- group3 Users-->
          <div class="panel panel-default" style="box-shadow: 10px 10px; ">
            <!-- heading -->
            <div class="panel-heading">
              <!-- title -->
              <div class="panel-title">
                <span style="float: right;">
                  <a class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse3"> More Info </a>
                </span>

                <span class="h3">
                  Users
                </span><br>

                <span>
                  <!-- faciities count -->
                  <?php
                  $sql = "SELECT * FROM users";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    Total User <span class="badge"><?php echo $count; ?></span>
                  <?php } ?>
                  <!-- faciities count -->
                </span>

                <a href="adminuseradd.php">| Add User <span class="glyphicon glyphicon-plus"></span></a>

                <a href="adminuserremove2.php">| Remove User <span class="glyphicon glyphicon-minus"></span></a>

              </div>
              <!-- title -->
            </div>
            <!-- heading -->

            <!-- collapse -->
            <div id="collapse3" class="panel-collapse collapse">
              <!-- body -->
              <div class="panel-body">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home3">Admin</a></li>
                  <li><a data-toggle="tab" href="#menu111">Receptionist</a></li>
                  <li><a data-toggle="tab" href="#menu222">Cashier</a></li>
                  <li><a data-toggle="tab" href="#menu333">Disabled</a></li>
                </ul>

                <!-- content -->
                <div class="tab-content">

                  <div id="home3" class="tab-pane fade in active">
                    <?php
                    require 'adminuseradmins.php';
                    ?>
                  </div>

                  <div id="menu111" class="tab-pane fade">
                    <?php
                    require 'adminuserreceptionist.php';
                    ?>
                  </div>

                  <div id="menu222" class="tab-pane fade">
                    <?php
                    require 'adminusercashiers.php';
                    ?>
                  </div>

                  <div id="menu333" class="tab-pane fade">
                    <?php
                    require 'adminuserdisabled.php';
                    ?>
                  </div>

                </div>
                <!-- content -->
              </div>
              <!-- body -->
            </div>
            <!-- collapse -->
          </div>
          <!-- group3 -->
          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

          <br><br>

          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
          <!-- group4 -->
          <div class="panel panel-default" style="box-shadow: 10px 10px; ">
            <!-- heading -->
            <div class="panel-heading">
              <!-- title -->
              <div class="panel-title">
                <span style="float: right;">
                  <a class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse4"> More Info </a>
                </span>

                <span class="h3">
                  Gallery
                </span><br>

                <span>
                  <!-- faciities count -->
                  <?php
                  $sql = "SELECT * FROM gallery";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    Total Picture <span class="badge"><?php echo $count; ?></span>
                  <?php } ?>
                  <!-- faciities count -->
                </span>

                <a href="admingalleryadd.php">| Add Picture <span class="glyphicon glyphicon-plus"></span></a>
              </div>
              <!-- title -->
            </div>
            <!-- heading -->

            <!-- collapse -->
            <div id="collapse4" class="panel-collapse collapse">
              <!-- body -->
              <div class="panel-body">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home4">Home</a></li>

                </ul>

                <div class="tab-content">

                  <div id="home4" class="tab-pane fade in active">
                    <?php
                    require 'admingallery.php';
                    ?>
                  </div>


                </div>
              </div>
              <!-- body -->
            </div>
            <!-- collapse -->
          </div>
          <!-- group4 -->
          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

          <br><br>

          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
          <!-- group5 -->
          <div class="panel panel-default" style="box-shadow: 10px 10px; ">
            <!-- heading -->
            <div class="panel-heading">
              <!-- title -->
              <div class="panel-title">
                <span style="float: right;">
                  <a class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse5"> More Info </a>
                </span>

                <span class="h3">
                  Feedback
                </span><br>

                <span>
                  <!-- faciities count -->
                  <?php
                  $sql = "SELECT * FROM feedback ";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    Total Feedbacks <span class="badge"><?php echo $count; ?></span>
                  <?php } ?>
                  <!-- faciities count -->
                </span>


              </div>
              <!-- title -->
            </div>
            <!-- heading -->

            <!-- collapse -->
            <div id="collapse5" class="panel-collapse collapse">
              <!-- body -->
              <div class="panel-body">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home5">Feedback</a></li>

                </ul>

                <div class="tab-content">
                  <div id="home5" class="tab-pane fade in active">
                    <?php
                    require 'feedback.php';
                    ?>
                  </div>

                </div>
              </div>
              <!-- body -->
            </div>
            <!-- collapse -->
          </div>
          <!-- group5 -->
          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

          <br><br>



          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
          <!-- group6 -->
          <div class="panel panel-default" style="box-shadow: 10px 10px; ">
            <!-- heading -->
            <div class="panel-heading">
              <!-- title -->
              <div class="panel-title">
                <span style="float: right;">
                  <a class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse7"> More Info </a>
                </span>

                <span class="h3">
                  GCASH
                </span><br>

                <span>
                  <!-- faciities count -->
                  <?php
                  $sql = "SELECT * FROM gcash";
                  $result = ($conn->query($sql));
                  //declare array to store the data of database
                  $row = [];

                  if ($result->num_rows >= 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);

                    $count = $result->num_rows;

                  ?>
                    Total GCASH <span class="badge"><?php echo $count; ?></span>
                  <?php } ?>
                  <!-- faciities count -->
                </span>


              </div>
              <!-- title -->
            </div>
            <!-- heading -->

            <!-- collapse -->
            <div id="collapse7" class="panel-collapse collapse">
              <!-- body -->
              <div class="panel-body">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home7">GCASH Details</a></li>

                </ul>

                <div class="tab-content">
                  <div id="home7" class="tab-pane fade in active">
                    <?php
                    require 'gcash.php';
                    ?>
                  </div>

                </div>
              </div>
              <!-- body -->
            </div>
            <!-- collapse -->
          </div>
          <!-- group6 -->
          <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        </div>
        <!-- JUMBOTRON ACCORDION -->
        <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

      </div>
      <!-- COL -->
    </div>
    <!-- ROW -->

    <div class="row" style="text-align: center; padding:3%;">
      <div class="col-xs-12">
       
      </div>
    </div>





  </div>
  <!-- CONTAINER -->
  <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->





  <!-- ############################################################################################# -->
</body>

</html>