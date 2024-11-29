<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADD USER</title>
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
  <div class="panel-heading">Add New User</div>
  <div class="panel-body">

<a href="admin.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-arrow-left"></span></a>

  </div>
</div>
<!-- panel -->


<!-- ADD USER -->
<form class="form-inline" action="adminsql.php" method="POST" enctype="multipart/form-data">

    <!-- name -->
    <div class="form-group">
      <span class="form-group-addon"><i class="glyphicon glyphicon-alert"> Name:</i></span> <br>
      <div class="col-sm">
      <input type="text" class="form-control text-center" id="name" name="name" 
      placeholder="Enter user name" required>
      </div>
    </div>
    <!-- name -->

     <!-- user status -->
     <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-stats"> Select User Status:</i></span> <br>
    <div class="col-sm">

      <label class="radio-inline form-control"><input type="radio" name="user_status" value="ACTIVE" checked>ACTIVE</label>
     <label class="radio-inline form-control"><input type="radio" name="user_status" value="DISABLE">DISABLE</label>
    
    
      </div>
    </div>
    <!-- user status -->

    <!-- user type -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-stats"> Select User Type:</i></span> <br>
    <div class="col-sm">

      <label class="radio-inline form-control"><input type="radio" name="user_type" value="Admin" checked>Admin</label>
     <label class="radio-inline form-control"><input type="radio" name="user_type" value="Receptionist">Receptionist</label>
     <label class="radio-inline form-control"><input type="radio" name="user_type" value="Cashier">Cashier</label>
    
      </div>
    </div>
    <!-- user type -->

    <!-- user name -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-alert"> User Name:</i></span> <br>
    <div class="col-sm">
      <input type="text" class="form-control text-center" id="user_name" name="user_name" 
      placeholder="Enter user name" required>
      </div>
    </div>
    <!-- user name -->

    <!-- user password -->
    <div class="form-group">
    <span class="form-group-addon"><i class="glyphicon glyphicon-lock"> Password:</i></span> <br>
    <div class="col-sm">
      <input type="text" class="form-control text-center" id="user_password" name="user_password" 
      placeholder="Enter user password" required>
      </div>
    </div>
    <!-- user password -->

   

    <button type="submit" name="btnuseradd" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button>
  
  </form>
<!-- ADD USER -->


<br><br>


    <!-- panel -->
<div class="panel panel-default">
  <div class="panel-heading">Added Users</div>
  <div class="panel-body">
    
  <?php
  require 'conn.php';
	$sql = "SELECT * FROM users ORDER BY user_id DESC";
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
      
       
        <th>Name</th>
        <th>User Status</th>
        <th>User Type</th>
        <th>User Name</th>
        <th>User Password</th>
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
      
        
        <td><?php echo $rows['name']; ?></td>
        <td><?php echo $rows['user_status']; ?></td>
        <td><?php echo $rows['user_type']; ?></td>
        <td><?php echo $rows['user_name']; ?></td>
        <td><?php echo $rows['user_password']; ?></td>

        <td>
            <div class="btn-group">
			<a href="adminuseredit.php?user_id=<?php echo $rows['user_id']; ?>" class="btn btn-outline-primary">Edit</a>
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
