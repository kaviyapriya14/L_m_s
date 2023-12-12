<?php
$servername="localhost";
$username="root";
$password="";

$conn=new mysqli($servername,$username,$password);
if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}
$databaseName="db_lms";
$sql="CREATE DATABASE IF NOT EXISTS $databaseName";

if ($conn->query($sql) === TRUE) {
    echo "Database '$databaseName' created successfully!";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db($databaseName);
$sqlcreatetable="CREATE TABLE IF NOT EXISTS user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20),
    password VARCHAR(60) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    last_login TIMESTAMP,
    status ENUM('active', 'inactive') DEFAULT 'active'

)";
if($conn->query($sqlcreatetable)==TRUE){
    echo "Table 'users' created successfully!";
}else{
    echo"Error creating table: ".$conn->error;
}

$sqlroletable="CREATE TABLE IF NOT EXISTS role(
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('active','inactive')DEFAULT 'active'
    )";
if($conn->query($sqlroletable)==TRUE){
    echo "Table 'role' created successfully!";
}else{
    echo "Error creating table: ".$conn->error;
}

$conn->close();

?>

