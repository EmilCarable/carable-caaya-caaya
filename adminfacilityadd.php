<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADD FACILITY</title>
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

<!-- container -->
<div class="container-fluid">
    <!-- jumbotron -->
  <div class="jumbotron">

  <!-- panel -->
  <div class="panel panel-default">
  <div class="panel-heading">Add New Facility</div>
  <div class="panel-body">

<a href="admin.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-arrow-left"></span></a>

  </div>
</div>
<!-- panel -->


<!-- ADD FACILITY -->
<form class="form-inline" action="adminsql.php" method="POST" enctype="multipart/form-data">

    <!-- image -->
    <div class="form-group">
      <span class="form-group-addon"><i class="glyphicon glyphicon-picture"> Choose Facility Image (Main Image)</i></span> <br>
      <div class="col-sm">
      <input type="file" class="form-control text-center" id="facility_image" name="facility_image" 
      placeholder="Enter user name" required>
      </div>
    </div>
    <!-- image -->

    <!-- status -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-stats"> Select Facility Status</i></span> <br>
    <div class="col-sm">

    <label class="radio-inline form-control"><input type="radio" name="facility_status" value="Available" checked>Available</label>
     <label class="radio-inline form-control"><input type="radio" name="facility_status" value="Unavailable">Unavailable</label>
    
      </div>
    </div>
    <!-- status -->

    <!-- name -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-alert"> Enter Facility Name:</i></span> <br>
    <div class="col-sm">
      <input type="text" class="form-control text-center" id="facility_name" name="facility_name" 
      placeholder="Enter facility name" required>
      </div>
    </div>
    <!-- name -->

    <!-- type -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-lock"> Select Facility Type</i></span> <br>
    <div class="col-sm">

      <label class="radio-inline form-control"><input type="radio" name="facility_type" value="Room" checked>Room</label>
     <label class="radio-inline form-control"><input type="radio" name="facility_type" value="Cottage">Cottage</label>
     <label class="radio-inline form-control"><input type="radio" name="facility_type" value="Venues">Venues</label>
    
      </div>
    </div>
    <!-- type -->

    <!-- capacity -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-alert"> Enter Facility Capacity:</i></span> <br>
    <div class="col-sm">
      <input type="number" class="form-control text-center" id="facility_capacity" name="facility_capacity" 
      placeholder="Enter facility capacity" required>
      </div>
    </div>
    <!-- capacity -->

    <!-- price -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-usd"></i></span> <br>
    <div class="col-sm">
      <input type="number" class="form-control text-center" id="facility_price" name="facility_price" 
      placeholder="Enter facility price" required>
      </div>
    </div> 
    <!-- price -->
    

    <button type="submit" name="btnfacilityadd" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button>
  
  </form>
<!-- ADD FACILITY -->

<br><br>

    <!-- panel -->
<div class="panel panel-default">
  <div class="panel-heading">Added Facilities</div>
  <div class="panel-body">
    
  <?php
  require 'conn.php';
	$sql = "SELECT * FROM facilities ORDER BY facility_id DESC";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];

	if ($result->num_rows > 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);
	}

  
?>

<!-- Table -->
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
      <th>Facility Image</th>
        <th>Facility Status</th>
       
        <th>Facility Name</th>
        <th>Facility Type</th>
        <th>Facility Capacity</th>
        <th>Facility Price</th>
        <th>Image 1</th>
        <th>Image 2</th>
        <th>Image 3</th>
        <th>Image 4</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
            <?php
			if(!empty($row))
			foreach($row as $rows)
			{
			?>
      <tr>
      <td> 
        <img src="<?php echo $rows['facility_image']; ?>" class="img-rounded" width="80px" height="80px"> 
    </td>
        <td><?php echo $rows['facility_status']; ?></td>
        
        <td><?php echo $rows['facility_name']; ?></td>
        <td><?php echo $rows['facility_type']; ?></td>
        <td><?php echo $rows['facility_capacity']; ?></td>
        <td><?php echo $rows['facility_price']; ?></td>

        <td>
        <img src="<?php echo $rows['img_1']; ?>" class="img-rounded" width="80px" height="80px">
        </td>
        <td>
        <img src="<?php echo $rows['img_2']; ?>" class="img-rounded" width="80px" height="80px">
        </td>
        <td>
        <img src="<?php echo $rows['img_3']; ?>" class="img-rounded" width="80px" height="80px">
        </td>
        <td>
        <img src="<?php echo $rows['img_4']; ?>" class="img-rounded" width="80px" height="80px">
        </td>

        <td>
            <div class="btn-group">
			<a href="adminfacilityedit.php?facility_id=<?php echo $rows['facility_id']; ?>" class="btn btn-outline-primary">Edit</a>
            </div>
        </td>

      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
  <!-- Table -->

  </div>
</div>
<!-- panel -->

 

















  </div>
  <!-- jumbotron -->
  <?php
    require 'footer.php';
    ?>











  
</div>
<!-- container -->












<!-- ############################################################################################# -->
</body>
</html>
