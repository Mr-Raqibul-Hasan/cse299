<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "appointments_database";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn)
    {
        echo "Connection OK"
    }
    else
    {
    }

$query = "SELECT * FROM appointments";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='appointment'>";
        echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Number:</strong> " . $row["number"] . "</p>";
        echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
        echo "<p><strong>Time:</strong> " . $row["time"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No appointments found";
}
mysqli_close($connection);
?>
