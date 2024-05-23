<?php

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

$sql = "SELECT * FROM graphicdesignresources";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<title>The Information about innovationmanagementresources</title>";
    echo "<h1>The Information about innovationmanagementresources</h1>";
    echo "<table border='1'>
            <tr>
                <th>resource_id</th>
                <th>title</th>
               <th>description</th>
               <th>upload_date</th>
                
            </tr>";

    

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["resource_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["upload_date"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}


$conn->close();
?>
