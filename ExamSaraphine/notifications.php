<?php
//nzabacahe seraphine 222019160---> 2024
                // Database connection parameters
require_once "databaseconnection.php";

$sql = "SELECT * FROM notifications";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about notifications</title>";
    echo "<h1>The Information about notifications</h1>";
    echo "<table border='1'>
            <tr>
                <th>notification_id</th>
                <th>user_id</th>
                <th>message</th>
               
                
            </tr>";

     

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["notification_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
       
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}


$conn->close();
?>
