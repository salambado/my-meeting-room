<?php
$server_name = "localhost";
$username = "root";
$password = "";
$databaseName = "my_meeting_room";
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ID_admin = $_POST["ID_admin"];
    $admin = $_POST["admin"];
    
   
    
    // Insert data into the "complaint" table using prepared statement
    $sql = "INSERT INTO officer (ID_admin, admin) 
            VALUES (:ID_admin, :admin)";
    
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(":ID_admin", $ID_admin);
    $stmt->bindParam(":admin", $admin);
    
    
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
