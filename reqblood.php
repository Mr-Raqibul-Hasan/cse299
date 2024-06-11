<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "appointments_database"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$blood_group = $_POST['blood_group'];
$units = $_POST['units'];
$hospital = $_POST['hospital'];
$additional_info = $_POST['additional_info'];

$sql = "INSERT INTO blood_requests (name, email, contact, blood_group, units, hospital, additional_info)
        VALUES ('$name', '$email', '$contact', '$blood_group', '$units', '$hospital', '$additional_info')";

if ($conn->query($sql) === TRUE) {
    echo "Blood request submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
