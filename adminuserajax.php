<?php
// Include your database connection code here
require 'verify.php';

$name = $_GET['name'];

// Fetch data from the database
$data = array();
$result = mysqli_query($conn, "SELECT * FROM users WHERE name = '$name'");

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_free_result($result);
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>