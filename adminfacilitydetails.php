<!DOCTYPE html>
<html lang="en">
<head>
  <title>Facility Details</title>
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

$facility_id = $_GET['facility_id'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT * FROM facilities WHERE facility_id = '$facility_id'");

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
    Facility Details
    </p>

<div class="btn-group btn-group-justified" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

<a href="admin.php" class="btn btn-primary" data-toggle="tooltip" title="RETURN">
       <span class="glyphicon glyphicon-arrow-left"></span>
</a>

<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModalUpdate">
      <span class="glyphicon glyphicon-edit"></span>
</a>

<a href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown" >
      <span class="glyphicon glyphicon-picture"></span>
</a>

  <ul class="dropdown-menu" role="menu">
    <li><a href="#" data-toggle="modal" data-target="#myModalMain">Main Image</a></li>
    <li><a href="#" data-toggle="modal" data-target="#myModalImg1">Additional Image 1</a></li>
    <li><a href="#" data-toggle="modal" data-target="#myModalImg2">Additional Image 2</a></li>
    <li><a href="#" data-toggle="modal" data-target="#myModalImg3">Additional Image 3</a></li>
    <li><a href="#" data-toggle="modal" data-target="#myModalImg4">Additional Image 4</a></li>
  </ul>

</div>

  </div><!-- HEADING -->

  <!-- BODY -->
  <div class="panel-body">
  <?php 
    // Fetch and display the data
while ($stmt->fetch()) {

  // Display the data securely
    ?>
<!-- ####################################### CONTENT ############################################ -->

<!-- Modal Update -->
<div id="myModalUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upate Facility Details</h4>
      </div>

      <div class="modal-body">
              
<!-- ####################################### FORM ############################################ -->
<form class="form-horizontal" action="adminsql.php?facility_id=<?php echo htmlspecialchars($facility_id); ?>" method="POST" enctype="multipart/form-data">


         Current Status:       
   <?php 
    $facility_status = htmlspecialchars($facility_status);
                   
   if($facility_status == "Available"){?>
     <span style="color: green;">
      <?php echo htmlspecialchars($facility_status); ?>
       </span>
      <?php } else {?>
      <span style="color: red;">
      <?php echo htmlspecialchars($facility_status); ?>
         </span>
     <?php } ?>   
                 

  <div class="form-group">
    <label class="control-label col-sm-4" for="facility_status">Facility Status:</label>
    <div class="col-sm-6">     

    <?php 
    $facility_status = htmlspecialchars($facility_status);
                    
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

  

  <div class="form-group">
    <label class="control-label col-sm-4" for="facility_capacity">Faciliy Capacity:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control text-center" id="facility_capacity" name="facility_capacity"
      value="<?php echo htmlspecialchars($facility_capacity); ?>" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-4" for="facility_price">Faciliy Price:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control text-center" id="facility_price" name="facility_price"
      value="<?php echo htmlspecialchars($facility_price); ?>" required>
    </div>
  </div>

  

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="btnfacilityupdate" name="btnfacilityupdate" class="btn btn-default">DONE</button>
    </div>
  </div>

</form>
<!-- ####################################### FORM ############################################ -->     

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div> <!-- Modal content-->

  </div>
</div><!-- Modal Update -->


<!-- Modal Image Main -->
<div id="myModalMain" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Main Image</h4>
      </div>

      <div class="modal-body">

        Current Image:
      <img src="<?php echo htmlspecialchars($facility_image); ?>" alt="" class="img-responsive img-rounded"> <br>
      
      <!-- ####################################### FORM ############################################ -->            
<form class="form-horizontal" action="adminsql.php?facility_id=<?php echo htmlspecialchars($facility_id); ?>" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-sm-4" for="facility_image">Select New Image:</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" id="facility_image" name="facility_image" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="btnimgmain" name="btnimgmain" class="btn btn-default">DONE</button>
    </div>
  </div>

</form>
<!-- ####################################### FORM ############################################ -->    
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- Modal content-->

  </div>
</div><!-- Modal Image Main -->


<!-- Modal Image 1 -->
<div id="myModalImg1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Additional Image 1</h4>
      </div>

      <div class="modal-body">

        Current Image:
      <img src="<?php echo htmlspecialchars($img_1); ?>" alt="" class="img-responsive img-rounded"> <br>
      
      <!-- ####################################### FORM ############################################ -->            
<form class="form-horizontal" action="adminsql.php?facility_id=<?php echo htmlspecialchars($facility_id); ?>" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-sm-4" for="img_1">Select New Image:</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" id="img_1" name="img_1" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="btnimg1" name="btnimg1" class="btn btn-default">DONE</button>
    </div>
  </div>

</form>
<!-- ####################################### FORM ############################################ -->    
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- Modal content-->

  </div>
</div><!-- Modal Image 1 -->


<!-- Modal Image 2 -->
<div id="myModalImg2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Additional Image 2</h4>
      </div>

      <div class="modal-body">

        Current Image:
      <img src="<?php echo htmlspecialchars($img_2); ?>" alt="" class="img-responsive img-rounded"> <br>
      
      <!-- ####################################### FORM ############################################ -->            
<form class="form-horizontal" action="adminsql.php?facility_id=<?php echo htmlspecialchars($facility_id); ?>" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-sm-4" for="img_2">Select New Image:</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" id="img_2" name="img_2" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="btnimg2" name="btnimg2" class="btn btn-default">DONE</button>
    </div>
  </div>

</form>
<!-- ####################################### FORM ############################################ -->    
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- Modal content-->

  </div>
</div><!-- Modal Image 2 -->


<!-- Modal Image 3 -->
<div id="myModalImg3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Additional Image 3</h4>
      </div>

      <div class="modal-body">

        Current Image:
      <img src="<?php echo htmlspecialchars($img_3); ?>" alt="" class="img-responsive img-rounded"> <br>
      
      <!-- ####################################### FORM ############################################ -->            
<form class="form-horizontal" action="adminsql.php?facility_id=<?php echo htmlspecialchars($facility_id); ?>" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-sm-4" for="img_3">Select New Image:</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" id="img_3" name="img_3" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="btnimg3" name="btnimg3" class="btn btn-default">DONE</button>
    </div>
  </div>

</form>
<!-- ####################################### FORM ############################################ -->    
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- Modal content-->

  </div>
</div><!-- Modal Image 3 -->


<!-- Modal Image 4 -->
<div id="myModalImg4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Additional Image 4</h4>
      </div>

      <div class="modal-body">

        Current Image:
      <img src="<?php echo htmlspecialchars($img_4); ?>" alt="" class="img-responsive img-rounded"> <br>
      
      <!-- ####################################### FORM ############################################ -->            
<form class="form-horizontal" action="adminsql.php?facility_id=<?php echo htmlspecialchars($facility_id); ?>" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-sm-4" for="img_4">Select New Image:</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" id="img_4" name="img_4" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="btnimg4" name="btnimg4" class="btn btn-default">DONE</button>
    </div>
  </div>

</form>
<!-- ####################################### FORM ############################################ -->    
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- Modal content-->

  </div>
</div><!-- Modal Image 4 -->


<p style="background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight:bold;">

<?php echo htmlspecialchars($facility_name); ?>

</p>

<!-- IMAGE -->
<img src="<?php echo htmlspecialchars($facility_image); ?>" class="img-rounded img-responsive" 
style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 1% 10%;">
<!-- IMAGE -->

<!-- ADDITIONAL IMAGE -->
<!-- img1 -->

<img src="<?php echo htmlspecialchars($img_1); ?>" data-toggle="modal" data-target="#img1" 
class="img-responsive img-rounded" alt="" width="50%" 
style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 1% 10%; float: left;">

<!-- Modal -->
<div id="img1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;"> <span><?php echo htmlspecialchars($img_1); ?></span></h4>
      </div>
      <div class="modal-body">
		<p style="text-align: center;">
        <img src="<?php echo htmlspecialchars($img_1); ?>" alt=""  width="100%">
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- img1 -->

<!-- img2 -->

<img src="<?php echo htmlspecialchars($img_2); ?>" data-toggle="modal" data-target="#img2" 
class="img-responsive img-rounded" alt="" width="50%" 
style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 1% 10%; float:left;">


<!-- Modal -->
<div id="img2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;"> <span><?php echo htmlspecialchars($img_2); ?></span></h4>
      </div>
      <div class="modal-body">
		<p style="text-align: center;">
        <img src="<?php echo htmlspecialchars($img_2); ?>" alt=""  width="100%">
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- img2 -->

<!-- img3 -->

<img src="<?php echo htmlspecialchars($img_3); ?>" data-toggle="modal" data-target="#img3" 
class="img-responsive" alt="" width="50%" 
style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 1% 10%; float:left;">


<!-- Modal -->
<div id="img3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;"> <span><?php echo htmlspecialchars($img_3); ?></span></h4>
      </div>
      <div class="modal-body">
		<p style="text-align: center;">
        <img src="<?php echo htmlspecialchars($img_3); ?>" alt=""  width="100%">
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- img3 -->

<!-- img4 -->

<img src="<?php echo htmlspecialchars($img_4); ?>" data-toggle="modal" data-target="#img4" 
class="img-responsive" alt="" width="50%" 
style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 1% 10%; ">


<!-- Modal -->
<div id="img4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;"> <span><?php echo htmlspecialchars($img_4); ?></span></h4>
      </div>
      <div class="modal-body">
		<p style="text-align: center;">
        <img src="<?php echo htmlspecialchars($img_4); ?>" alt=""  width="100%">
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div><!-- Modal -->

<!-- img4 -->
<!-- ADDITIONAL IMAGE -->

<!-- DETAILS -->
<div class="alert alert-info " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">

Facility Type: <span style="color: darkviolet;"><?php echo htmlspecialchars($facility_type); ?></span> <br>

Facility Status: <span style="color: darkviolet;"><?php echo htmlspecialchars($facility_status); ?></span> <br>
 
Capacity: <span style="color: darkviolet;">Good For <?php echo htmlspecialchars($facility_capacity); ?> People</span> <br> 
     
Price: <span style="color: darkviolet;"><?php echo htmlspecialchars($facility_price); ?></span>
  


</div>
<!-- DETAILS -->











<!-- ####################################### CONTENT ############################################ -->
<?php 
  }

  // Close the statement and database connection
  $stmt->close();
  $conn->close();
    ?>
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