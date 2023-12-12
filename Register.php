<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_lms";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
    $last_login = date("Y-m-d H:i:s");

    $sql = "INSERT INTO user (role_id, first_name, last_name, email, phone_number, password, created_at, updated_at, last_login, status) 
            VALUES (1, '$first_name', '$last_name', '$email', '$phone_number', '$hashedPassword', '$created_at', '$updated_at', '$last_login', 'active')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "User registered successfully!";
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
echo $successMessage;

?>

