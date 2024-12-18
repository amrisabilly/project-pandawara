<?php
include('../config/database.php');
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$link = $_POST['link'];
$image = $_POST['image'];


// Function: Add Event
    $sql = "UPDATE event SET 
            title = '$title', 
            description = '$description', 
            date = '$date', 
            link = '$link', 
            image = '$image' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/event.php");
        exit();
    } else {
        return "Error: " . mysqli_error($conn);
    }


?>
