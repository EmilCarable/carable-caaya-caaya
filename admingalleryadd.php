<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADD GALERY IMAGE</title>
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
  <div class="panel-heading" style="padding: 1%;">


  <a href="admin.php" style="float: left;">
    <button type="button" class="btn btn-primary btn-sm">
    <span class="glyphicon glyphicon-arrow-left"></span>
    </button>
  </a>

<span>
    ADD GALERY IMAGE
    </span>
</div><!-- HEADING -->

  <!-- BODY -->
  <div class="panel-body">

 
    
  <!-- FORM -->
  <form class="form-inline" action="adminsql.php" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="gallery_image">Select Gallery Image:</label> <br>
    <input type="file" class="form-control" id="gallery_image" name="gallery_image" required>
  </div>

  <div class="form-group">
    <label for="gallery_name">Gallery Name:</label><br>
    <input type="text" class="form-control" id="gallery_name" name="gallery_name" required>
  </div>

  <div class="form-group">
    <label for="gallery_caption">Gallery Caption:</label><br>
    <input type="text" class="form-control" id="gallery_caption" name="gallery_caption" required>
  </div>

 <br><br>

  <button type="submit" id="btngalleryadd" name="btngalleryadd" class="btn btn-success">Submit</button>
  
</form>  <!-- FORM -->


  </div><!-- BODY -->

  <!-- FOOTER -->
  <div class="panel-footer">2023</div><!-- FOOTER -->

</div>
<!-- ####################################### PANEL ############################################ -->

</div>
<!-- ####################################### JUMBOTRON ############################################ -->
</div>
<!-- ####################################### CONTAINER ############################################ -->
<!-- ############################################################################################# -->
</body>
</html>