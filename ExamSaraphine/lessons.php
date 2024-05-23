<?php
//<!---nzabacahe seraphine 222019160--->
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

$sql = "SELECT * FROM lessons";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about  lessons</title>";
    echo "<h1>The Information about  lessons</h1>";
    echo "<table border='1'>
            <tr>
                <th>lesson_id</th>
                <th>module_id</th>
                <th>title</th>
               <th>content</th>
               <th>sequence_order</th>

                
            </tr>";

     //NZAYISENGA MAY 2024

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["lesson_id"] . "</td>";
        echo "<td>" . $row["module_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["content"] . "</td>";
        echo "<td>" . $row["sequence_order"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}



$conn->close();
?>
