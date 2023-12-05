<?php
include 'connect.php';

function displayData($con) {
    $sql = "SELECT * FROM information"; // Modify query as per your table structure
    $result = $con->query($sql);

    echo '<table class="table table-striped">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Address</th>';
    echo '<th>Section</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['ID'] . '</td>';
            echo '<td>' . $row['Name'] . '</td>'; // Corrected column name to match your database
            echo '<td>' . $row['Address'] . '</td>'; // Corrected column name to match your database
            echo '<td>' . $row['Section'] . '</td>'; // Corrected column name to match your database
            echo '</tr>';
        }
    } else {
        echo "<tr><td colspan='4'>No data found</td></tr>";
    }

    echo '</tbody>';
    echo '</table>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .print-btn {
            color: #fff;
            background-color: #28a745; /* Green color */
            border-color: #28a745; /* Green color */
        }

        @media print {
            .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
   

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CRUD App</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Add</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="display.php">Display</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link print-btn" href="javascript:window.print()">Print</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <?php
        displayData($con);
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
