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
    $stmt = $conn->prepare("INSERT INTO donors (name, email, blood_group) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $blood_group);

    $name = $_POST["name"];
    $email = $_POST["email"];
    $blood_group = $_POST["blood_group"];

    if ($stmt->execute() === TRUE) {
        echo "Registration successful.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
