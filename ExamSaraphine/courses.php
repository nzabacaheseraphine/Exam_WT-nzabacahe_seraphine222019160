<?php
require_once "databaseconnection.php";

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>The Information about Courses</title>";
    echo "<link rel='stylesheet' href='css/style2.css'>";
    echo "<link rel='stylesheet' href='css/style7.css'>";
    echo "</head>";
    echo "<body>";
    echo "<center>";
    echo "<h1>The Information about Courses</h1>";
    echo "<table border='1'>
            <tr>
                <th>Course ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Instructor ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Price</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["course_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["instructor_id"] . "</td>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</center>";
    echo "</body>";
    echo "</html>";
} else {
    echo "No information found";
}

$conn->close();
?>
