<!-- ####################################### ROOMS ############################################ -->
<!-- ####################################### SQL ############################################ -->
<?php
//require_once 'conn.php';

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT * FROM facilities WHERE facility_type = 'Venue' ORDER BY facility_id DESC");

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
<!-- ####################################### TABLE ############################################ -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>          
                <th>Facility Image</th>
                <th>Facility Status</th>
                <th>Facility Name</th>
                <th>Facility Capacity</th>
                <th>Facility Price</th>
               
                <th>Option</th>
            <tr>
        </thead>
        <tbody>
        <?php 
    // Fetch and display the data
while ($stmt->fetch()) {

  // Display the data securely
    ?>
            <tr>
                <td><img src="<?php echo htmlspecialchars($facility_image); ?>" class="img-rounded img-responsive" width="100px" ></td>
                <td>
                    <p style="font-size: medium;">                 
                   <?php 
                    $facility_status = htmlspecialchars($facility_status);
                   
                   if($facility_status == "Available"){?>
                       <span style="color:green;">
                       <?php echo htmlspecialchars($facility_status); ?>
                       </span>
                       <?php } else {?>
                         <span style="color:red;">
                         <?php echo htmlspecialchars($facility_status); ?>
                       </span>
                         <?php } ?>   
                   </p>
                </td>
                <td><?php echo htmlspecialchars($facility_name); ?></td>
                <td><?php echo htmlspecialchars($facility_capacity); ?></td>
                <td><?php echo htmlspecialchars($facility_price); ?></td>
               
                <td>
                <div class="btn-group-vertical">
			<a href="adminfacilitydetails.php?facility_id=<?php echo htmlspecialchars($facility_id); ?>" 
      class="btn btn-outline-primary btn-lg" role="button"> <span class="glyphicon glyphicon-list-alt"></span>
    </a>
      </div>
                </td>
            </tr>
            <?php 
  }

  // Close the statement and database connection
  $stmt->close();
  //$conn->close();
    ?>
        </tbody>
    </table>
</div>
<!-- ####################################### TABLE ############################################ -->
<!-- ####################################### ROOMS ############################################ -->
<!-- HEADING -->