<!DOCTYPE html>
<html lang="en">
<head>
  <title>FACILITY EDIT</title>
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

<?php
require 'conn.php';
  $facility_id=$_GET['facility_id'];
	$sql = "SELECT * FROM facilities WHERE facility_id='$facility_id'";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];

	if ($result->num_rows > 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);
	}
?>

<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			?>

<!-- container -->
<div class="container-fluid">
  <!-- jmbotron -->
  <div class="jumbotron">
<!-- panel -->
<div class="panel panel-default">
  <div class="panel-heading">Edit Facility</div>
  <div class="panel-body">
    <!-- button -->
<a href="admin.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-arrow-left"></span></a>
<span>Name: <?php echo $rows['facility_name']; ?> | Type: <?php echo $rows['facility_type']; ?></span>
<!-- button -->
  </div>
</div>
<!-- panel -->



   <!-- TABLE -->
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
      <th>Facility Image (Main Image)</th>
        <th>Facility Status</th>
        
       
        <th>Facility Capacity</th>
        <th>Facility Price</th>

      
       
        <th>Option</th>
        
      </tr>
    </thead>
    <tbody>
            
      <tr>
        <!-- FORM -->
        <form class="form-inline" action="adminsql.php?facility_id=<?php echo $facility_id; ?>" method="POST" enctype="multipart/form-data">

        <!-- image -->
        <td> 
            <img src="<?php echo $rows['facility_image']; ?>" class="" width="100px" height="100px"> 
        </td>
        <!-- image -->

        <!-- status -->
        <td>
            <!-- status -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-stats"></i> Select Status:</span> <br>
    <div class="col-sm">
    <?php 
                     $facility_status = $rows['facility_status'];
                    
                    if($facility_status == "Available"){?>
                        <div class="radio">
        <label><input type="radio" name="facility_status" value="Available" checked>Available</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="facility_status" value="Unavailable">Unavailable</label>
    </div>
                        <?php } else {?>
                          <div class="radio">
        <label><input type="radio" name="facility_status" value="Available">Available</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="facility_status" value="Unavailable" checked>Unavailable</label>
    </div>
                          <?php } ?>   
                    
    
      </div>
    </div>
    <!-- status -->
                   
                    <p style="font-size:medium;">
                    Current Status:
                   
                    <?php 
                     $facility_status = $rows['facility_status'];
                    
                    if($facility_status == "Available"){?>
                        <span style="color:green;">
                        <?php echo $rows['facility_status']; ?>
                        </span>
                        <?php } else {?>
                          <span style="color:red;">
                        <?php echo $rows['facility_status']; ?>
                        </span>
                          <?php } ?>   
                    </p>
            
        </td>
        <!-- status -->
        
       

        <!-- capacity -->
        <td>
          <!-- capacity -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-alert"></i> Input Capacity</span> <br>
    <div class="col-sm">
      <input type="number" class="form-control text-center" id="facility_capacity" name="facility_capacity" 
      placeholder="Enter facility capacity" value="<?php echo $rows['facility_capacity']; ?>" required>
      </div>
    </div>
    <span>
                    Current Capacity:
                    <?php echo $rows['facility_capacity']; ?>
                    </span>
    <!-- capacity --> 
        </td>
        <!-- capacity -->

        <!-- price -->
        <td>
          <!-- price -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-usd"></i> Input Price:</span> <br>
    <div class="col-sm">
      <input type="number" class="form-control text-center" id="facility_price" name="facility_price" 
      placeholder="Enter facility price" value="<?php echo $rows['facility_price']; ?>" required>
      </div>
    </div> 

    <span>
    Current Price:
                    <?php echo $rows['facility_price']; ?>
    </span>
    <!-- price -->
        </td>

        

        <!-- option -->
        <td>
        <button type="submit" name="btnfacilityupdate" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button>
        </td>
        <!-- option -->
       

        </form>
        <!-- FORM -->

        

      </tr>
      
    </tbody>
  </table>
  </div>
  <!-- TABLE -->   
<?php } ?>



    <h1>Bootstrap Tutorial</h1>
    <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing
    responsive, mobile-first projects on the web.</p>





  </div>
  <!-- jmbotron -->

  <?php
    require 'footer.php';
    ?>

</div>
<!-- container -->








<!-- ############################################################################################# -->
</body>
</html>
