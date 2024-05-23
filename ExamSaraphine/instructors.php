<?php
//---nzabacahe seraphine 222019160--->
// Database connection parameters
require_once "databaseconnection.php";

$sql = "SELECT * FROM instructors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>The Information about Instructors</title>";
    echo "</head>";
    echo "<body>";
    echo "<h1>The Information about Instructors</h1>";
    echo "<table border='1'>
            <tr>
                <th>Instructor ID</th>
                <th>User ID</th>
                <th>Bio</th>
                <th>Expertise</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["instructor_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["bio"] . "</td>";
        echo "<td>" . $row["expertise"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</body>";
    echo "</html>";
} else {
    echo "No information found";
}

$conn->close();
?>
