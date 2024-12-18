<?php
include('../config/database.php');
$id = $_POST['id'];
$title = $_POST['title'];
$location = $_POST['location'];

// Query untuk mengedit data local hero
    $sql = "UPDATE local_hero SET title = '$title', location = '$location' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/local_hero.php");
        exit();
    } else {
        return "Error: " . mysqli_error($conn);
    }


?>
