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
                    <li class="active"><a href="#"></a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!--  ////////////////////////////////////////// NAVBAR ///////////////////////////////////////////// -->

    <div class="container">
        <!--  ////////////////////////////////////////// CONTAINER ///////////////////////////////////////////// -->

        <p>Click a user name to view data!</p>


        <!--  ////////////////////////////////////////// ROW ///////////////////////////////////////////// -->
        <div class="row">

            <!--  ////////////////////////////////////////// COL ///////////////////////////////////////////// -->
            <div class="col-xs-4">

                <?php
                $sql = "SELECT * FROM users WHERE user_type='Admin'";
                $result = ($conn->query($sql));
                //declare array to store the data of database
                $row = [];

                if ($result->num_rows > 0) {
                    // fetch all data from db into array
                    $row = $result->fetch_all(MYSQLI_ASSOC);
                }
                ?>

                <!--  ////////////////////////////////////////// TABLE ///////////////////////////////////////////// -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($row))
                                foreach ($row as $rows) {
                            ?>
                                <tr id="nameList">


                                    <td class="name"><?php echo $rows['name']; ?></td>



                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!--  ////////////////////////////////////////// TABLE ///////////////////////////////////////////// -->

            </div>
            <!--  ////////////////////////////////////////// COL ///////////////////////////////////////////// -->


            <div class="col-xs-8">

                <div id="content">
                    <!-- Content will be loaded here -->
                </div>

                <script>
                    $(document).ready(function() {
                        // When a name is clicked
                        $(".name").click(function() {
                            // Get the name text
                            var name = $(this).text();

                            // Make an AJAX request to your PHP script with the selected name
                            $.ajax({
                                url: "adminusercontent.php", // Specify the PHP script URL
                                type: "GET",
                                data: {
                                    name: name
                                }, // Send the name as a parameter
                                success: function(response) {
                                    // Update the content div with the response from the server
                                    $("#content").html(response);
                                },
                                error: function() {
                                    alert("Error loading content");
                                }
                            });
                        });
                    });
                </script>

            </div>

        </div>
        <!--  ////////////////////////////////////////// ROW ///////////////////////////////////////////// -->


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