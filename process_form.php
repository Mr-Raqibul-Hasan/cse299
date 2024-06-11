<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "appointments_database"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $stmt = $conn->prepare("INSERT INTO appointments (name, number, appointment_date, appointment_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $number, $appointment_date, $appointment_time);

    $name = $_POST["name"];
    $number = $_POST["number"];
    $appointment_date = $_POST["date"];
    $appointment_time = $_POST["time"];

    if ($stmt->execute() === TRUE) {
        echo "Appointment booked successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
