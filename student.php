<?php
$server_name = "localhost";
$username = "root";
$password = "";
$databaseName = "my_meeting_room";
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $ID_admin = $_POST["ID_admin"];
   
    
    // Insert data into the "complaint" table using prepared statement
    $sql = "INSERT INTO student (id, email, name, ID_admin) 
            VALUES (:id, :email, :name, :ID_admin)";
    
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":ID_admin", $ID_admin);
   
    
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