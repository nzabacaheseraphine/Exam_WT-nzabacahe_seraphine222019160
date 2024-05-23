<?php
session_start();
//<!---nzabacahe seraphine 222019160--->

// Connect to database (replace dbmodule_id   , usermodule_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $module_id = $_POST['module_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sequence_order = $_POST['sequence_order'];

    $sql = "INSERT INTO lessons (module_id, title, content, sequence_order) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $module_id, $title, $content, $sequence_order);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['lesson_id'];
    $newmodule_id = $_POST['newmodule_id'];
    $newtitle = $_POST['newtitle'];
    $newcontent = $_POST['newcontent'];
    $newsequence_order = $_POST['newsequence_order'];

    $sql = "UPDATE lessons SET module_id=?, title=?, content=?, sequence_order=? WHERE lesson_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssi", $newmodule_id, $newtitle, $newcontent, $newsequence_order, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['lesson_id'];

    $sql = "DELETE FROM lessons WHERE lesson_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains lesson_id
    $id = $_POST['lesson_id'];

    // Select user_lessons's information from the database
    $sql = "SELECT * FROM lessons WHERE lesson_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_lessons information
        $row = $result->fetch_assoc();
        echo "lesson_id: " . $row["lesson_id"] . "<br>";
        echo "module_id: " . $row["module_id"] . "<br>";
        echo "title: " . $row["title"] . "<br>";
        echo "content: " . $row["content"] . "<br>";

    } else {
        echo "No user found with the provided ID.";
    }
}
?>
