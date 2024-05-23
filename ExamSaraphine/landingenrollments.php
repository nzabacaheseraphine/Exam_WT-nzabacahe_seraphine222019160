<?php
session_start();

// Connect to database (replace dbuser_id, useruser_id, password with actual credentials)
require_once "databaseconnection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];
    $enrollment_date = $_POST['enrollment_date'];

    $sql = "INSERT INTO enrollments (course_id, user_id, enrollment_date) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $course_id, $user_id, $enrollment_date);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['enrollment_id'];
    $new_user_id = $_POST['new_user_id'];
    $new_course_id = $_POST['new_course_id'];
    $new_enrollment_date = $_POST['new_enrollment_date'];

    $sql = "UPDATE enrollments SET course_id = ?, user_id = ?, enrollment_date = ? WHERE enrollment_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssi", $new_course_id, $new_user_id, $new_enrollment_date, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['enrollment_id'];

    $sql = "DELETE FROM enrollments WHERE enrollment_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains enrollment_id
    $id = $_POST['enrollment_id'];

    // Select user_enrollments's information from the database
    $sql = "SELECT * FROM enrollments WHERE enrollment_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_enrollments information
        $row = $result->fetch_assoc();
        echo "enrollment_id: " . $row["enrollment_id"] . "<br>";
        echo "user_id: " . $row["user_id"] . "<br>";
        echo "course_id: " . $row["course_id"] . "<br>";
        echo "enrollment_date: " . $row["enrollment_date"] . "<br>";
    } else {
        echo "No record found with the provided ID.";
    }
}
?>
