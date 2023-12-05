<?php
// Include your database connection file
include 'connect.php';

// Initialize variables
$name = $address = $section = '';

// Check if the ID is provided via GET method and it's numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record with the provided ID
    $sql = "SELECT * FROM information WHERE ID = $id";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Debug: Output the fetched row data

        // Check if the expected keys exist in the fetched row (with uppercase)
        if (isset($row['Name'], $row['Address'], $row['Section'])) {
            $name = $row['Name'];
            $address = $row['Address'];
            $section = $row['Section'];
        } else {
            echo "Required data not found in the fetched row.";
            exit();
        }
    } else {
        // Redirect or display an error message if the record with the provided ID doesn't exist
        echo "Record not found.";
        exit();
    }
} else {
    // Redirect or display an error message if ID is not provided or invalid
    echo "Invalid or missing ID.";
    exit();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $section = $_POST['section'];

    // Update the record in the database
    $sql = "UPDATE information SET Name='$name', Address='$address', Section='$section' WHERE ID=$id";

    if ($con->query($sql) === TRUE) {
        // Redirect to display.php after successful update
        header("Location: display.php");
        exit();
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header class="bg-dark text-white text-center py-4">
        <h1>Update Record</h1>
    </header>

    <div class="container mt-4">
        <form method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" required>
            </div>

            <div class="form-group">
                <label for="section">Section:</label>
                <input type="text" class="form-control" name="section" value="<?php echo $section; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
