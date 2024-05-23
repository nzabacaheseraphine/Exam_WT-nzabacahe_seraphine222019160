<?php
session_start();
//<!---nzabacahe seraphine 222019160--->

// Connect to database (replace dbuser_id, useruser_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $bio = $_POST['user_id'];
    $bio = $_POST['bio'];
    $expertise = $_POST['expertise'];


    $sql = "INSERT INTO instructors ( user_id,bio,  expertise) VALUES (?,?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss",$user_id,$bio, $expertise);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['instructor_id'];
   $newuser_id = $_POST['newuser_id'];
    $newbio = $_POST['newbio'];
   
    $newexpertise = $_POST['newexpertise'];
   
    $sql = "UPDATE instructors SET  bio=?, expertise=?  WHERE instructor_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssi", $newbio, $newexpertise,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['instructor_id'];

    $sql = "DELETE FROM instructors WHERE instructor_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains instructor_id
    $id = $_POST['instructor_id'];

    // Select user_instructors's information from the database
    $sql = "SELECT * FROM instructors WHERE instructor_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_instructors information
        $row = $result->fetch_assoc();
        echo "instructor_id: " . $row["instructor_id"] . "<br>";
        echo "user_id: " . $row["user_id"] . "<br>";
        echo "bio: " . $row["bio"] . "<br>";
        echo "expertise: " . $row["expertise"] . "<br>";
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>