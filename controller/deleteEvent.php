<?php
include('../config/database.php');
$id = $_POST['id'];

    $sql = "DELETE FROM event WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/event.php");
        exit();
    } else {
        return "Error: " . mysqli_error($conn);
    }


?>
