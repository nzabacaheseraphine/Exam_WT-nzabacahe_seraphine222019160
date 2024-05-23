<?php
session_start();
//<!---nzabacahe seraphine 222019160--->

// Connect to database (replace dbcourse_id   , usercourse_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $title = $_POST['title'];
   $start_date = $_POST['start_date'];
   $end_date = $_POST['end_date'];
    $sql = "INSERT INTO workshops (title,start_date,end_date) values (?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss",$title ,$start_date,$end_date);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['workshop_id'];
    $newtitle = $_POST['newtitle'];
    $newstart_date = $_POST['newstart_date'];
    $newend_date = $_POST['newend_date'];
    $sql = "UPDATE workshops SET  title=?,start_date=?,end_date=? WHERE workshop_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssi",$newtitle,$start_date,$end_date,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['workshop_id'];

    $sql = "DELETE FROM workshops WHERE workshop_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains start_date
    $id = $_POST['workshop_id'];

    // Select user_workshops's information from the database
    $sql = "SELECT * FROM workshops WHERE workshop_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_workshops information
        $row = $result->fetch_assoc();
        echo "workshop_id: " . $row["workshop_id"] . "<br>";
        echo "title: " . $row["title"] . "<br>";
        echo "start_date: " . $row["start_date"] . "<br>";
        echo "end_date: " . $row["end_date"] . "<br>";
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>