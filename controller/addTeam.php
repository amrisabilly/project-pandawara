<?php
include('../config/database.php');
$name = $_POST['name'];
$image = $_POST['image'];

// Query untuk menambahkan data team
    $sql = "INSERT INTO team (name, image) VALUES ('$name', '$image')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/team.php");
        exit();
    } else {
        return "Error: " . mysqli_error($conn);
        exit();
    }


?>
