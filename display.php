<?php
include 'connect.php';

function displayData($con) {
    $sql = "SELECT * FROM information"; // Modify query as per your table structure
    $result = $con->query($sql);

    echo '<table class="table table-bordered">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Address</th>';
    echo '<th>Section</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';

    if ($result->num_rows > 0) {
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['ID'] . '</td>';
            echo '<td>' . $row['Name'] . '</td>'; // Corrected column name to match your database
            echo '<td>' . $row['Address'] . '</td>'; // Corrected column name to match your database
            echo '<td>' . $row['Section'] . '</td>'; // Corrected column name to match your database
            echo '<td>';
            echo '<a href="delete.php?id=' . $row['ID'] . '" class="btn btn-danger">Delete</a>';
            echo ' | ';
            echo '<a href="update.php?id=' . $row['ID'] . '" class="btn btn-primary">Update</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }

    echo '</table>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CRUD App</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Add</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="display.php">Display</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="print.php">Print</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <?php
        displayData($con);
        ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
