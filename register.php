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
$password = $_POST['password'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

$sql = "INSERT INTO patients (name, email, password, dob, gender)
        VALUES ('$name', '$email', '$password', '$dob', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
