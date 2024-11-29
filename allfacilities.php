<?php 
require_once 'conn.php';

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT

facilities.facility_id,
facilities.facility_image,
facilities.facility_name,
facilities.facility_status



 
  FROM facilities
 
  WHERE facility_status='Available'
 ");
$stmt->execute();


// Bind the result variables
$stmt->bind_result(
	$facility_id,
  $facility_image,
  $facility_name,
  $facility_status


  

);

// Fetch and display the data
while ($stmt->fetch()) {



	// Display the data securely

?>




 <!-- image -->
 <div class="col-sm-2" style="padding: 1%;">
    <div class="thumbnail">

		<a href="facilitydetails.php?facility_id=<?php echo htmlspecialchars($facility_id); ?>">
        <img src=" <?php echo htmlspecialchars($facility_image); ?>" alt="<?php echo htmlspecialchars($facility_name); ?>" width="200px" height="200px">
		</a>

		<div class="caption">
          <p><?php echo htmlspecialchars($facility_name); ?></p>
        </div>
     
    </div>
	
  </div>
  <!-- image -->






<?php 
  }

  // Close the statement and database connection
  $stmt->close();
  //$conn->close();
    ?>




