<?php
session_start();

// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";
//<!---nzabacahe seraphine 222019160--->

if (isset($_GET['query'])) {
    $searchTerm = $_GET['query'];
    $output = "";

    $queries = [
        'users' => "SELECT user_id, username, password, firstname, lastname, role, email FROM users WHERE user_id LIKE ?",
        'attendances' => "SELECT attendance_id, workshop_id, user_id, attendance_date FROM attendances WHERE attendance_id LIKE ?",
        'courses' => "SELECT course_id, title, description, instructor_id, start_date, end_date FROM courses WHERE course_id LIKE ?",
        'enrollments' => "SELECT enrollment_id, course_id, user_id, enrollment_date FROM enrollments WHERE enrollment_id LIKE ?",
        'graphicdesignresources' => "SELECT resource_id, title, description, upload_date FROM graphicdesignresources WHERE resource_id LIKE ?",
        'notifications' => "SELECT notification_id, message, user_id FROM notifications WHERE notification_id LIKE ?",
        'messages' => "SELECT message_id, sender_id, receiver_id,  message_content FROM messages WHERE message_id LIKE ?",
        'submissions' => "SELECT submission_id,assignment_id,user_id,grade FROM submissions WHERE submission_id LIKE ?",
        'workshops' => "SELECT workshop_id,title,start_date,end_date FROM workshops WHERE workshop_id LIKE ?",
        'instructors' => "SELECT user_id,bio,  expertise FROM instructors WHERE instructor_id LIKE ?"
    ];

    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        $output .= "<h3>Table of $table:</h3>";
        
        if ($result) {
            if ($result->num_rows > 0) {
                $output .= "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $output .= "<li>";
                    foreach ($row as $key => $value) {
                        $output .= "$key: $value, ";
                    }
                    $output .= "</li>";
                }
                $output .= "</ul>";
            } else {
                $output .= "<p>No results found in $table matching the search term: '$searchTerm'</p>";
            }
        } else {
            $output .= "<p>Error executing query: " . $connection->error . "</p>";
        }
    }

    echo $output;

    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
