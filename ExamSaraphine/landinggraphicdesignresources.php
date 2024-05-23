<?php
session_start();


// Connect to database (replace dbuserid, useruserid, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    
    $title = $_POST['title'];
    $description = $_POST['description'];
   $upload_date = $_POST['upload_date'];

    $sql = "INSERT INTO graphicdesignresources ( title, description,upload_date) values (?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss",$title, $description,$upload_date);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['resource_id'];
   
    $newtitle = $_POST['newtitle'];
   
    $newdescription = $_POST['newdescription'];
    $newupload_date = $_POST['newupload_date'];
   
    $sql = "UPDATE graphicdesignresources SET  title=?, description=? ,upload_date=? WHERE resource_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssi", $newtitle, $newdescription,$upload_date,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['resource_id'];

    $sql = "DELETE FROM graphicdesignresources WHERE resource_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains resource_id
    $id = $_POST['resource_id'];

    // Select user_graphicdesignresources's information from the database
    $sql = "SELECT * FROM graphicdesignresources WHERE resource_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_graphicdesignresources information
        $row = $result->fetch_assoc();
        echo "resource_id: " . $row["resource_id"] . "<br>";
        echo "title: " . $row["title"] . "<br>";
        echo "description: " . $row["description"] . "<br>";
         echo "upload_date: " . $row["upload_date"] . "<br>";
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>