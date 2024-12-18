<?php
include('../config/database.php');
$id = intval($_POST['id']);
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password


// Query untuk mengedit user
    $sql = "UPDATE user SET username = '$username', password = '$password' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/user.php");
        exit();
    } else {
        return "Error: " . mysqli_error($conn);
    }


?>
