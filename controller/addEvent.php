<?php
include('../config/database.php');
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$link = $_POST['link'];
$image = $_POST['image'];


// Function: Add Event
    $sql = "INSERT INTO event (title, description, date, link, image) 
            VALUES ('$title', '$description', '$date', '$link', '$image')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/event.php");
        exit();
    } else {
        return "Error: " . mysqli_error($conn);
    }


?>
