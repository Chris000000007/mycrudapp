<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $section = $_POST['section'];

    $sql = "INSERT INTO information (NAME, ADDRESS, SECTION) VALUES ('$name', '$address', '$section')";

    if ($con->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
