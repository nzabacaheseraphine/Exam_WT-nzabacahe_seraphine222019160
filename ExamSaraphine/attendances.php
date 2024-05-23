<?php

require_once "databaseconnection.php";

$sql = "SELECT * FROM attendances";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about attendances</title>";
    echo "<h1>The Information about attendances</h1>";
    echo "<table border='1'>
            <tr>
                <th>attendance_id</th>
                <th>workshop_id</th>
                <th>user_id</th>
               <th>attendance_date</th>
                
            </tr>";


    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["attendance_id"] . "</td>";
        echo "<td>" . $row["workshop_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["attendance_date"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}

$conn->close();
?>
