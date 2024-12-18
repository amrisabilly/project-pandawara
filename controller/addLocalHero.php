<?php
include('../config/database.php');
$title = $_POST['title'];
$location = $_POST['location'];

 // Query untuk menambahkan data local hero
    $sql = "INSERT INTO local_hero (title, location) VALUES ('$title', '$location')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/local_hero.php");
        exit();
    } else {
        return "Error: " . mysqli_error($conn);
    }


?>
