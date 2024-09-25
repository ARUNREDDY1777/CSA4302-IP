<?php

session_start();
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "organicweb"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM logindetails WHERE username='$userName' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $userName;
        header('Location: lab2.html'); 
        exit;
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        header('Location: login.html'); 
    }
}
?>
