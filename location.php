<?php
$server_name = "localhost";
$username = "root";
$password = "";
$databaseName = "my_meeting_room";
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ID_room = $_POST["ID_room"];
    $room = $_POST["room"];
    $status_id = $_POST["status_id"];
    $time = $_POST["time"];
    $day = $_POST["day"];
    $date = $_POST["date"];
   
    
    // Insert data into the "complaint" table using prepared statement
    $sql = "INSERT INTO location (ID_room, room, status_id, time, day, date) 
            VALUES (:ID_room, :room, :status_id, :time, :day, :date)";
    
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(":ID_room", $ID_room);
    $stmt->bindParam(":room", $room);
    $stmt->bindParam(":status_id", $status_id);
    $stmt->bindParam(":time", $time);
    $stmt->bindParam(":day", $day);
    $stmt->bindParam(":date", $date);
   
    
    try {
        if ($stmt->execute()) {
            echo "Complaint submitted successfully.";
        } else {
            echo "Error submitting complaint.";
        }
    } catch (PDOException $e) {
        echo "PDO Exception: " . $e->getMessage();
    }
}

?>