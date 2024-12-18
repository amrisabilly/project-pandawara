<?php
include('../config/database.php');
$id = $_POST['id'];

// Query untuk menghapus user
$sql = "DELETE FROM user WHERE id = $id";

if (mysqli_query($conn, $sql)) {
        header("Location: ../page/admin/user.php");
        exit(); // Berhenti setelah redirect
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

?>
