<?php
$servername = "localhost";
$username = "Seraphine";
$password = "222019160sera";
$dbname = "virtual_graphic_design_workshop_platforms";
require_once "databaseconnection.php";

$sql = "SELECT * FROM messages";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about messages</title>";
    echo "<h1>The Information about messages</h1>";
    echo "<table border='1'>
            <tr>
                <th>message_id</th>
                <th>sender_id</th>
                <th>receiver_id</th>
               <th>message_content</th>
                
            </tr>";

     

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["message_id"] . "</td>";
        echo "<td>" . $row["sender_id"] . "</td>";
        echo "<td>" . $row["receiver_id"] . "</td>";
        echo "<td>" . $row["message_content"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}


$conn->close();
?>
