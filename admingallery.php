<?php
//require_once 'conn.php';

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT
* FROM gallery ORDER BY gallery_id DESC
 ");
$stmt->execute();

// Bind the result variables
$stmt->bind_result(

  $gallery_id,
  $gallery_status,
  $gallery_image,
  $gallery_name,
  $gallery_caption

);




?>

<!-- Table -->
<div class="table-responsive">      
  


  <table class="table">
    <!-- Header -->
    <thead>
      <tr>
      <th>Image</th>
      <th>Status</th>
      <th>Name</th>
        <th>Caption</th>
        

        <th>Option</th>
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
        
       
      <img src="<?php echo htmlspecialchars($gallery_image); ?>" class="img-rounded" width="80px" height="80px">
    
     
    </td><!-- data -->

    <!-- data -->
    <td>
     <?php echo htmlspecialchars($gallery_status); ?>
    </td><!-- data -->

     <!-- data -->
     <td>
     <?php echo htmlspecialchars($gallery_name); ?>
    </td><!-- data -->

    <!-- data -->
    <td>
     <?php echo htmlspecialchars($gallery_caption);?>
    </td><!-- data -->

<!-- data -->
        <td>
      <div class="btn-group-vertical">
		<a href="admingalleryedit.php?gallery_id=<?php echo htmlspecialchars($gallery_id);?>" 
      class="btn btn-outline-primary btn-lg" role="button">
      <span class="glyphicon glyphicon-cog"></span>
    </a>
      </div>
        </td>
<!-- data -->


        
      </tr><!-- Row -->

  <?php 
  }

  // Close the statement and database connection
  $stmt->close();
  //$conn->close();
    ?>

    </tbody><!-- Body -->
  </table>
 
  </div>
  <!-- Table -->

 



  
  