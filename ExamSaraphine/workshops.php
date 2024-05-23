<?php
//---nzabacahe seraphine 222019160 workshops.php---
// Database connection parameters
require_once "databaseconnection.php";

$sql = "SELECT * FROM workshops";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>The Information about Workshops</title>";
    echo "</head>";
    echo "<body>";
    echo "<h1>The Information about Workshops</h1>";
    echo "<table border='1'>
            <tr>
                <th>Workshop ID</th>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["workshop_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
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
