<!DOCTYPE html>
<html lang="en">

<head>
  <title>GALLERY EDIT</title>
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

  $gallery_id = $_GET['gallery_id'];

  // Prepare and execute the SQL statement
  $stmt = $conn->prepare("SELECT
* FROM gallery WHERE gallery_id=$gallery_id
 ");
  $stmt->execute();

  if ($stmt->num_rows() >= 0) {
    $count = $stmt->num_rows;
  }

  // Bind the result variables
  $stmt->bind_result(

    $gallery_id,
    $gallery_status,
    $gallery_image,
    $gallery_name,
    $gallery_caption

  );

  // Fetch and display the data
  while ($stmt->fetch()) {



    // Display the data securely


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

            <a href="admin.php" style="float: left;" class="btn btn-primary btn-sm" role="button">
              <span class="glyphicon glyphicon-arrow-left"></span>
              </button>
            </a>

            GALLERY EDIT

          </div><!-- HEADING -->

          <!-- BODY -->
          <div class="panel-body">



            <!-- FORM -->
            <form class="form-inline" action="adminsql.php?gallery_id=<?php echo htmlspecialchars($gallery_id); ?>" method="POST" enctype="multipart/form-data">


              <img src="<?php echo htmlspecialchars($gallery_image); ?>" class="img-rounded" width="250px" height="250px"> <br><br>



              <div class="form-group">
                <label for="gallery_name">Gallery Name:</label><br>
                <input type="text" class="form-control" id="gallery_name" name="gallery_name" value=" <?php echo htmlspecialchars($gallery_name); ?>" placeholder="Enter name" required>
              </div>

              <div class="form-group">
                <label for="gallery_caption">Gallery Caption:</label><br>
                <input type="text" class="form-control" id="gallery_caption" name="gallery_caption" value=" <?php echo htmlspecialchars($gallery_caption); ?>" placeholder="Enter caption" required>
              </div>

              <div class="form-group">
<label for="gallery_status">Choose Status:</label>
                <div class="radio">
                  <label><input type="radio" name="gallery_status" checked value="<?php echo htmlspecialchars($gallery_status); ?>">current - <?php echo htmlspecialchars($gallery_status); ?></label>
                </div>

                <div class="radio">
                  <label><input type="radio" name="gallery_status" value="ACTIVE">ACTIVE</label>
                </div>

                <div class="radio">
                  <label><input type="radio" name="gallery_status" value="DISABLE">DISABLE</label>
                </div>

              </div>



              <button type="submit" id="btngalleryupdate" name="btngalleryupdate" class="btn btn-success">Update</button>

            </form> <!-- FORM -->

          </div><!-- BODY -->

          <!-- FOOTER -->
          <div class="panel-footer">2023</div><!-- FOOTER -->

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
  //$conn->close();
  ?>

  <!-- ############################################################################################# -->
</body>

</html>