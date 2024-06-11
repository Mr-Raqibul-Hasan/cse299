<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "appointments_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn)
    {
    }
    else
    {
    }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM doctors WHERE email = '$email' && password = '$password'";
        $data = mysqli_query($conn, $query);


    }

    

    $sql = "SELECT * FROM doctors WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: doclogdis.html");
        exit();
    } else {
        echo "Invalid email or password";
    }

    $conn->close();
}
?>
