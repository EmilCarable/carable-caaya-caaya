<?php
require 'verify.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>USER EDIT</title>
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

  <!--  ////////////////////////////////////////// NAVBAR ///////////////////////////////////////////// -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">BRORS</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="admin.php">Home</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!--  ////////////////////////////////////////// NAVBAR ///////////////////////////////////////////// -->

  <!--  ////////////////////////////////////////// CONTAINER ///////////////////////////////////////////// -->
  <div class="container">

    <?php
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = [];

    if ($result->num_rows > 0) {
      // fetch all data from db into array
      $row = $result->fetch_all(MYSQLI_ASSOC);
    }
    ?>

    <a href="adminuserremove2.php" class="btn btn-default">Return</a>

    <h1>Users</h1>

    <!-- Table -->
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>User Status</th>
            <th>User Type</th>
            <th>User Name</th>
            <th>User Password</th>



            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($row))
            foreach ($row as $rows) {
          ?>



            <tr>

              <form action="adminsql.php?user_id=<?php echo $rows['user_id']; ?>" method="POST" enctype="multipart/form-data">

                <td>

                  <input type="text" value="<?php echo $rows['name']; ?>" name="name">
                </td>

                <td>
                  <select class="form-control" id="user_status" name="user_status">
                  <option>current - <?php echo $rows['user_status']; ?></option>
                    <option>ACTIVE</option>
                    <option>DISABLE</option>
                  
                  </select>
                 

                </td>

                <td>
                  <input type="text" value="<?php echo $rows['user_type']; ?>" name="user_type" readonly>

                </td>

                <td>
                  <input type="text" value="<?php echo $rows['user_name']; ?>" name="user_name">

                </td>

                <td>
                  <input type="text" value="<?php echo $rows['user_password']; ?>" name="user_password">

                </td>


                <td>
                  <button type="submit" class="btn btn-default" name="btnuserupdate">Submit</button>
                </td>

              </form>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- Table -->

  </div>
  <!--  ////////////////////////////////////////// CONTAINER ///////////////////////////////////////////// -->









  <div class="row" style="text-align: center; padding:3%;">
    <div class="col-xs-12">
      <!-- FOOTER -->
      <?php
      require 'footer.php';
      $conn->close();
      ?>
      <!-- FOOTER -->
    </div>
  </div>

  <!-- ############################################################################################# -->
</body>

</html>