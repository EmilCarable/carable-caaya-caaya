<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brors";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>