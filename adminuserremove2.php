<?php
require 'verify.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BRORS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

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

    <div class="container">
        <!--  ////////////////////////////////////////// CONTAINER ///////////////////////////////////////////// -->

        <?php
        $sql = "SELECT * FROM users";
        $result = ($conn->query($sql));
        //declare array to store the data of database
        $row = [];

        if ($result->num_rows > 0) {
            // fetch all data from db into array
            $row = $result->fetch_all(MYSQLI_ASSOC);
        }


        ?>

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


                            <td><?php echo $rows['name']; ?></td>
                            <td><?php echo $rows['user_status']; ?></td>
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


        <!--  ////////////////////////////////////////// CONTAINER ///////////////////////////////////////////// -->
    </div>

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

    <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
</body>

</html>