<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "appointments_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn)
    {
        //echo "Connection OK"
    }
    else
    {
       // echo "Connection Failed".mysql_connect_error();
    }

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM patients WHERE email = '$email' && password = '$password'";
        $data = mysqli_query($conn, $query);


    }

    

    // SQL query to check if the user exists
    $sql = "SELECT * FROM patients WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, redirect to dashboard or another page
        header("Location: index.html");
        exit();
    } else {
        // User does not exist or credentials are incorrect
        echo "Invalid email or password";
    }

    // Close connection
    $conn->close();
}
?>
