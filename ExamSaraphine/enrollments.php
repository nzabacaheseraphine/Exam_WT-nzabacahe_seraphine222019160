<?php
$servername = "localhost";
$username = "Seraphine";
$password = "222019160sera";
$dbname = "virtual_graphic_design_workshop_platforms";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query
$sql = "SELECT * FROM enrollments";

// Execute query
$result = $conn->query($sql);

// Check if there are any results
if ($result) {
    if ($result->num_rows > 0) {
        echo "<title>The Information about enrollments</title>";
        echo "<h1>The Information about enrollments</h1>";
        echo "<table border='1'>
                <tr>
                    <th>enrollment_id</th>
                    <th>user_id</th>
                    <th>course_id</th>
                    <th>enrollment_date</th>
                </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["enrollment_id"] . "</td>";
            echo "<td>" . $row["user_id"] . "</td>";
            echo "<td>" . $row["course_id"] . "</td>";
            echo "<td>" . $row["enrollment_date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No information found";
    }
} else {
    echo "Error executing the query: " . $conn->error;
}

// Close connection
$conn->close();
?>
