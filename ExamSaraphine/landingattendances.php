<?php
session_start();
//--nzabacahe seraphine 222019160--->

// Connect to database (replace dbworkshop_id   , userworkshop_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $workshop_id = $_POST['workshop_id'];
    $user_id = $_POST['user_id'];
    $attendance_date = $_POST['attendance_date'];
   

    $sql = "INSERT INTO attendances (workshop_id, user_id,  attendance_date) values (?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $workshop_id, $user_id, $attendance_date);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['attendance_id'];
    $newworkshop_id = $_POST['newworkshop_id'];
    $newuser_id = $_POST['newuser_id'];
   
    $newattendance_date = $_POST['newattendance_date'];
   
    $sql = "UPDATE attendances SET workshop_id=?, user_id=?, attendance_date=?  WHERE attendance_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssi", $newworkshop_id   , $newuser_id, $newattendance_date,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['attendance_id'];

    $sql = "DELETE FROM attendances WHERE attendance_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains attendance_id
    $id = $_POST['attendance_id'];

    // Select user_attendances's information from the database
    $sql = "SELECT * FROM attendances WHERE attendance_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_attendances information
        $row = $result->fetch_assoc();
        echo "attendance_id: " . $row["attendance_id"] . "<br>";
        echo "workshop_id: " . $row["workshop_id"] . "<br>";
        echo "user_id: " . $row["user_id"] . "<br>";
        echo "attendance_date: " . $row["attendance_date"] . "<br>";
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>