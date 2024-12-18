<?php
include('../config/database.php');
$id = $_POST['id'];

    $sql = "DELETE FROM team WHERE id = $id";

if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/team.php");
        exit(); // Berhenti setelah redirect
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }


?>
