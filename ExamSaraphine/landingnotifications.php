<?php
session_start();
//<!---nzabacahe seraphine 222019160--->

// Connect to database (replace dbuser_id, useruser_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $user_id = $_POST['user_id'];
    $message = $_POST['message'];
    
   

    $sql = "INSERT INTO notifications ( message, user_id) VALUES (?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss",$message, $user_id);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['notification_id'];
   $newuser_id = $_POST['newuser_id'];
    $newmessage = $_POST['newmessage'];
   
    
   
    $sql = "UPDATE notifications SET  message=?, user_id=?  WHERE notification_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssi", $newmessage, $newuser_id,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['notification_id'];

    $sql = "DELETE FROM notifications WHERE notification_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains notification_id
    $id = $_POST['notification_id'];

    // Select user_notifications's information from the database
    $sql = "SELECT * FROM notifications WHERE notification_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_notifications information
        $row = $result->fetch_assoc();
        echo "notification_id: " . $row["notification_id"] . "<br>";
        echo "user_id: " . $row["user_id"] . "<br>";
        echo "message: " . $row["message"] . "<br>";
        
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>