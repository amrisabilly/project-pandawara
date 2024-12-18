<?php
include('../config/database.php');
$id = $_POST['id'];
$name = $_POST['name'];
$image = $_POST['image'];

// Query untuk mengedit data team
    $sql = "UPDATE team SET name = '$name', image = '$image' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/team.php");
        exit(); 
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }


?>
