<?php
//<!---nzabacahe seraphine 222019160--->april 2024
                // Database connection parameters
require_once "databaseconnection.php";
$sql = "SELECT * FROM permissions";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about permissions</title>";
    echo "<h1>The Information about permissions</h1>";
    echo "<table border='1'>
            <tr>
                <th>permissionid</th>
                <th>userid</th>
                <th>deviceid</th>
               <th>permissiontype</th>
                
            </tr>";

     

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["permissionid"] . "</td>";
        echo "<td>" . $row["userid"] . "</td>";
        echo "<td>" . $row["deviceid"] . "</td>";
        echo "<td>" . $row["permissiontype"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}


$conn->close();
?>
