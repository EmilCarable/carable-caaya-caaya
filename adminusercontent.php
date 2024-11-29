<?php
require 'verify.php';

// Your PHP logic to fetch content from the database based on the received name
if (isset($_GET['name'])) {

    // Fetch content from the database based on the received name
    $name = $_GET['name'];

?>

    <!-- //////////////////////////////////////// TABLE //////////////////////////////////////// -->
    <div class="table-responsive">
        <table id="data-table" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>User Type</th>
                    <th>User Name</th>
                    <th>User Password</th>

                </tr>
            </thead>
            <tbody>
                <!-- Table rows will be added dynamically -->
            </tbody>
        </table>
    </div>
    <!-- //////////////////////////////////////// TABLE //////////////////////////////////////// -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tableBody = document.querySelector("#data-table tbody");

            // Function to fetch data from the server
            function fetchData() {
                const xhr = new XMLHttpRequest();
                xhr.open("GET", "adminuserajax.php?name=<?php echo $name ?>", true);

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);

                        // Clear existing table rows
                        tableBody.innerHTML = "";

                        // Populate the table with fetched data
                        data.forEach(function(row) {
                            const newRow = document.createElement("tr");
                            newRow.innerHTML =
                                `<td>${row.name}</td>
                <td>${row.user_type}</td>
                <td>${row.period_covered_start}</td>
                <td>${row.period_covered_end}</td>
             
                
                `;
                            tableBody.appendChild(newRow);
                        });
                    }
                };

                xhr.send();
            }

            // Fetch data initially
            fetchData();

            // Fetch data again every X seconds (e.g., every 5 seconds)
            setInterval(fetchData, 1000); // Adjust the interval as needed
        });
    </script>



<?php
    $result = $conn->query("SELECT * FROM users WHERE name = '$name'");



    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $content = $row["user_id"] . " " . $row["name"];
        echo $content;
    } else {
        echo "Content not found for $name";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Name parameter not provided.";
}
?>