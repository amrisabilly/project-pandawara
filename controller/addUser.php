<?php
include('../config/database.php');
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password

// Query untuk menambahkan user
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";


    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/user.php");
        exit();
    } else {
        return "Error: " . mysqli_error($conn);
        exit();
    }


?>
