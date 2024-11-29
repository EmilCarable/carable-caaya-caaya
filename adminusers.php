<?php
	$sql = "SELECT * FROM users";
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