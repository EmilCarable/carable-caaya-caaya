<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cashier Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- CONTAINER -->
<div class="container-fluid" >

  <!-- ROW -->
  <div class="row">
    <!-- COL -->
  <div class="col-xs-12">
  <?php
require 'cashiernavbar.php';

require_once 'conn.php';
?>
  </div><!-- COL -->
  </div><!-- ROW -->
  <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <br><br><br>

<div class="row">
    <div class="col-xs-12">
        <p class="" style="font-weight: bold; font-size:medium;">
            Dashboard
        </p>

    </div>
</div>


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
       <form class="form-horizontal" action="cashierreport.php" method="POST" enctype="multipart/form-data">

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


  <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <!-- ROW -->
<div class="row">
    <!-- COL -->
<div class="col-xs-12" style="color: black; ">

<!-- PANELGROUP -->
<div class="panel-group">
    <!-- paneldefault -->

  <div class="panel panel-default" style="box-shadow: 10px 10px;">
    <!-- panelheading -->
    <div class="panel-heading">
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <span style="float: right;">
    <a class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse1" > More Info </a>
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

	if ($result->num_rows >= 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);

        $count = $result->num_rows;
	
?>
            <span>
            Total Reservation <span class="badge"><?php echo $count ; ?></span>
            </span><?php } ?>|
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- reservation count -->

<!-- reservation pending -->
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
               
<?php
       
	$sql = "SELECT * FROM reservation WHERE reservation_status='Pending'";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];

	if ($result->num_rows >= 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);

        $count = $result->num_rows;
	
?>
            <span>
            Pending Reservation <span class="badge"><?php echo $count ; ?></span>
            </span><?php } ?>|
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- reservation pending -->

<!-- reservation current -->
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
               
<?php
       
	$sql = "SELECT * FROM reservation WHERE reservation_status='Reserved'";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];

	if ($result->num_rows >= 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);

        $count = $result->num_rows;
	
?>
            <span>
            Current Reservation <span class="badge"><?php echo $count ; ?></span>
            </span><?php } ?>|
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- reservation current -->

<!-- reservation finished -->
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php
       
	$sql = "SELECT * FROM reservation WHERE reservation_status='Finished'";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];

	if ($result->num_rows >= 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);

        $count = $result->num_rows;
	
?>
            <span>
            Finished Reservation <span class="badge"><?php echo $count ; ?></span>
            </span><?php } ?>|
 <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- reservation finished -->


<!-- reservation invalid -->
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php
       
	$sql = "SELECT * FROM reservation WHERE reservation_status='Invalid'";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];

	if ($result->num_rows >= 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);

        $count = $result->num_rows;
	
?>
            <span>
            Ivalid Reservation <span class="badge"><?php echo $count ; ?></span>
            </span><?php } ?>
 <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- reservation invalid -->





<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div><!-- panelheading -->

    <!-- panelcollapse -->
    <div id="collapse1" class="panel-collapse collapse">
      
    <!-- navtabs -->
    <!-- navtabsbutton -->
  <ul class="nav nav-tabs">  
  <li class="active"><a data-toggle="tab" href="#home">Pending Reservation</a></li>
  <li><a data-toggle="tab" href="#menu1">Reserved</a></li>
  <li><a data-toggle="tab" href="#menu2">Finished Reservation</a></li>
  <li><a data-toggle="tab" href="#menu3">Invalid Reservation</a></li>
  
 
 
</ul><!-- navtabsbutton -->

<!-- navtabscontent -->
<div class="tab-content">

  <div id="home" class="tab-pane fade in active">
  <?php
require 'cashierreservationpending.php';
?>
  </div>

  <div id="menu1" class="tab-pane fade">
  <?php
require 'cashierreservationcurrent.php';
?>
  </div>

  <div id="menu2" class="tab-pane fade">
  <?php
require 'cashierreservationfinished.php';
?>
  </div>

  <div id="menu3" class="tab-pane fade">
  <?php
require 'cashierreservationinvalid.php';
?>
  </div>

  
 
</div><!-- navtabscontent -->
<!-- navtabs -->

      <!-- panelfooter -->
      <div class="panel-footer" style="text-align: center;">
        Footer
    </div><!-- panelfooter -->

    </div><!-- panelcollapse -->
    
  </div><!-- paneldefault -->
</div><!-- PANELGROUP -->

  </div><!-- COL -->
</div><!-- ROW -->
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ####################################### ROW ############################################ -->
<div class="row">
  <!-- ####################################### COL ############################################ -->
  <div class="col-xs-12" style="text-align: center; margin-top: 3%;">

<!-- FOOTER -->
  </div>
  <!-- ####################################### COL ############################################ -->
</div>
<!-- ####################################### ROW ############################################ -->
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

</div><!-- CONTAINER -->
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
</body>
</html>