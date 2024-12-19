<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WatchNow";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $userType = 2; #variable 3

    $name = mysqli_real_escape_string($conn, $name); #variable 5
    $email = mysqli_real_escape_string($conn, $email); #variable 1
    $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber); #variable 4
    $password = mysqli_real_escape_string($conn, $password);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT); #variable 2

    $sql = "INSERT INTO Users (password, email, userType, phoneNumber, name) VALUES ('$hashed_password', '$email', '$userType', '$phoneNumber', '$name')";
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
    $conn->close();

    header("Location: RegistrationConfirmation.html");
    exit();
}

?>
