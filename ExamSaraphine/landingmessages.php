<?php
session_start();
//<!---nzabacahe seraphine 222019160--->

// Connect to database (replace dbsender_id   , usersender_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message_content = $_POST['message_content'];
   

    $sql = "INSERT INTO messages (sender_id, receiver_id,  message_content) values (?,?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $sender_id, $receiver_id, $message_content);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['message_id'];
    $newsender_id = $_POST['newsender_id'];
    $newreceiver_id = $_POST['newreceiver_id'];
   
    $newmessage_content = $_POST['newmessage_content'];
   
    $sql = "UPDATE messages SET sender_id=?, receiver_id=?, message_content=?  WHERE message_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssi", $newsender_id   , $newreceiver_id, $newmessage_content,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['message_id'];

    $sql = "DELETE FROM messages WHERE message_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains message_id
    $id = $_POST['message_id'];

    // Select user_messages's information from the database
    $sql = "SELECT * FROM messages WHERE message_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_messages information
        $row = $result->fetch_assoc();
        echo "message_id: " . $row["message_id"] . "<br>";
        echo "sender_id: " . $row["sender_id"] . "<br>";
        echo "receiver_id: " . $row["receiver_id"] . "<br>";
        echo "message_content: " . $row["message_content"] . "<br>";
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>