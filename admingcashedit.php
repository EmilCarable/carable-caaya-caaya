<!DOCTYPE html>
<html lang="en">
<head>
  <title>GCASH Edit</title>
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


// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT * FROM gcash ");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(
    $gcash_id,
    $gcash_image,
    $gcash_name,
    $gcash_number
);

// Fetch and display the data
while ($stmt->fetch()) {
    // Display the data securely
   
    //<button type="button" id="" class="btn btn-warning"  data-toggle="modal" data-target="#payment_proof"> show</button>
  
    
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
    
  <a href="admin.php" style="float: left;">
    <button type="button" class="btn btn-primary btn-sm">
    <span class="glyphicon glyphicon-arrow-left"></span>
    </button>
  </a>
  
  GCASH Details

</div><!-- HEADING -->

  <!-- BODY -->
  <div class="panel-body">

  <form class="form-inline" action="adminsql.php?gcash_id= <?php echo htmlspecialchars($gcash_id); ?>" method="POST" enctype="multipart/form-data">
    
<!-- Table -->
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
      <th>GCASH Image</th>
        <th>GCASH Owner</th>
        
        <th>GCASH Number</th>
      
       
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
           
      <tr>
      
        
        <td>

        <?php echo htmlspecialchars($gcash_image); ?> <br> <br>

        <div class="form-group">
    <label for="gcash_image">Upload New Image:</label><br>
    <input type="file" class="form-control" id="gcash_image" name="gcash_image" placeholder="Enter new image">
  </div>

    </td>

        <td>
        <?php echo htmlspecialchars($gcash_name); ?> <br><br>

        <div class="form-group">
    <label for="gcash_name">New Name:</label><br>
    <input type="text" class="form-control text-center" id="gcash_name" name="gcash_name" placeholder="Enter new name">
  </div>

    </td>

        <td>
        <?php echo htmlspecialchars($gcash_number); ?> <br><br>

        <div class="form-group">
    <label for="gcash_number">New Number:</label><br>
    <input type="number" class="form-control text-center" id="gcash_number" name="gcash_number" placeholder="Enter new number">
  </div>

    </td>
        

        <td>
            <div class="btn-group">
			<button type="submit" id="btngcashupdate" name="btngcashupdate" class="btn btn-warning"> Update GCASH </button>
            </div>
        </td>

      </tr>
  
    </tbody>
  </table>
  </div>
  <!-- Table -->

  </form>

  </div><!-- BODY -->

  <!-- FOOTER -->
  <div class="panel-footer">
   
  </div><!-- FOOTER -->

</div>
<!-- ####################################### PANEL ############################################ -->

</div>
<!-- ####################################### JUMBOTRON ############################################ -->
</div>
<!-- ####################################### CONTAINER ############################################ -->
<?php 
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
<!-- ############################################################################################# -->
</body>
</html>