<?php
	$sql = "SELECT * FROM facilities WHERE facility_type='Cottage'";
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
        
        <th>Capacity</th>
        <th>Price</th>
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
        <td>
        <p style="font-size:medium;">
                   
                   
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
        
        <td><?php echo $rows['facility_name']; ?></td>
        
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
			<a href="adminfacilityedit.php?facility_id=<?php echo $rows['facility_id']; ?>" 
      class="btn btn-outline-primary btn-lg" role="button"><i class="glyphicon glyphicon-cog"></i>
    </a>
      </div>

    <div class="dropdown">
  <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown">
  <i class="glyphicon glyphicon-picture"></i>
  <i class="glyphicon glyphicon-wrench"></i>
  <i class="glyphicon glyphicon-collapse-down"></i>
</button>

  <ul class="dropdown-menu">
    <li>Change Image:</li>
    
    <li>
      <div class="col-sm">
    <a href="adminfacilityedit.php?facility_id=<?php echo $rows['facility_id']; ?>" class="btn btn-info" role="button">Image (Main)</a> 
    </div>
  </li>

    <li>
    <div class="col-sm">
    <a href="img1.php?facility_id=<?php echo $rows['facility_id']; ?>" class="btn btn-info" role="button">Image (1)</a> 
    </div>
  </li>

  <li>
    <div class="col-sm">
    <a href="img2.php?facility_id=<?php echo $rows['facility_id']; ?>" class="btn btn-info" role="button">Image (2)</a> 
    </div>
  </li>
  
  <li>
    <div class="col-sm">
    <a href="img3.php?facility_id=<?php echo $rows['facility_id']; ?>" class="btn btn-info" role="button">Image (3)</a> 
    </div>
  </li>

  <li>
    <div class="col-sm">
    <a href="img4.php?facility_id=<?php echo $rows['facility_id']; ?>" class="btn btn-info" role="button">Image (4)</a> 
    </div>
  </li>
  
    <li>
    <div class="col-sm">
    <a href="imgall.php?facility_id=<?php echo $rows['facility_id']; ?>" class="btn btn-info" role="button">Image (1,2,3,4)</a> 
    </div>
  </li>
    
  </ul>
</div>


        </td>

      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
  <!-- Table -->

