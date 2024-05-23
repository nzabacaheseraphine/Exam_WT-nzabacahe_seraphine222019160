<?php
//nzabacahe seraphine 222019160---> 2024
                // Database connection parameters
$servername = "localhost";
$username = "Seraphine";
$password = "222019160sera";
$dbname = "virtual_graphic_design_workshop_platforms";


                // Create database connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check database connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

$sql = "SELECT * FROM submissions";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about submissions</title>";
    echo "<h1>The Information about submissions</h1>";
    echo "<table border='1'>
            <tr>
                <th>submission_id</th>
                <th>user_id</th>
               <th>assignment_id</th>
                 <th>grade</th>
                
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["submission_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["assignment_id"] . "</td>";
        echo "<td>" . $row["grade"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}


$conn->close();
?>
