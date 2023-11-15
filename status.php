<?php
$server_name = "localhost";
$username = "root";
$password = "";
$databaseName = "my_meeting_room";
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $status_id = $_POST["status_id"];  // Corrected variable name
    $status = $_POST["status"];        // Corrected variable name
   
    // Insert data into the "status" table using prepared statement
    $sql = "INSERT INTO status (status_id, status) 
            VALUES (:status_id, :status)";
    
    $stmt = $conn->prepare($sql);
    
    // Bind parameters with corrected variable names
    $stmt->bindParam(":status_id", $status_id);
    $stmt->bindParam(":status", $status);
   
    try {
        if ($stmt->execute()) {
            echo "Status submitted successfully.";
        } else {
            echo "Error submitting status.";
        }
    } catch (PDOException $e) {
        echo "PDO Exception: " . $e->getMessage();
    }
}

?>
