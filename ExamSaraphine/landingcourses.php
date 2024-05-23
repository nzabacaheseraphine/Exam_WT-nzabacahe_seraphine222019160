<?php
session_start();

// Connect to database (replace dbcourse_id, usercourse_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $instructor_id = $_POST['instructor_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $price = $_POST['price'];

    $sql = "INSERT INTO courses (title, description, instructor_id, start_date, end_date, price) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssss", $title, $description, $instructor_id, $start_date, $end_date, $price);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['course_id'];
    $newtitle = $_POST['newtitle'];
    $newdescription = $_POST['newdescription'];
    $newinstructor_id = $_POST['newinstructor_id'];
    $newstart_date = $_POST['newstart_date'];
    $newend_date = $_POST['newend_date'];
    $newprice = $_POST['newprice'];

    $sql = "UPDATE courses SET title = ?, description = ?, instructor_id = ?, start_date = ?, end_date = ?, price = ? WHERE course_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssi", $newtitle, $newdescription, $newinstructor_id, $newstart_date, $newend_date, $newprice, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['course_id'];

    $sql = "DELETE FROM courses WHERE course_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains course_id
    $id = $_POST['course_id'];

    // Select user_courses's information from the database
    $sql = "SELECT * FROM courses WHERE course_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_courses information
        $row = $result->fetch_assoc();
        echo "course_id: " . $row["course_id"] . "<br>";
        echo "title: " . $row["title"] . "<br>";
        echo "description: " . $row["description"] . "<br>";
        echo "instructor_id: " . $row["instructor_id"] . "<br>";
        echo "start_date: " . $row["start_date"] . "<br>";
        echo "end_date: " . $row["end_date"] . "<br>";
        echo "price: " . $row["price"] . "<br>";
        
    } else {
        echo "No user found with the provided ID.";
    }
}
?>
