<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare a delete statement
    $stmt = $con->prepare("DELETE FROM information WHERE ID = ?");
    
    // Bind the parameter (ID) to the statement
    $stmt->bind_param("i", $id);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect back to index.php after deletion
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    
    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>