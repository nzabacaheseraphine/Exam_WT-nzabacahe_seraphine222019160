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

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about users</title>";
    echo "<h1>The Information about users</h1>";
    echo "<table border='1'>
            <tr>
                <th>user_id</th>
                <th>username</th>
                <th>password</th>
               <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>role</th>
            </tr>";

     

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}

$conn->close();
?>
