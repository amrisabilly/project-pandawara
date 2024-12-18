<?php
include('../config/database.php');
$id = $_POST['id'];

// Query untuk menghapus data local hero
    $sql = "DELETE FROM local_hero WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/local_hero.php");
        exit();
    } else {
        return "Error: " . mysqli_error($conn);
    }


?>
