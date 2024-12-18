<?php
include('../config/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan user berdasarkan username
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        // Verifikasi password dengan hash di database
        if (password_verify($password, $user['password'])) {
            // Login berhasil
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            header("Location: ../page/admin/index.php"); // Arahkan ke halaman admin
            exit();
        } else {
            // Password salah
            $_SESSION['error'] = "Incorrect password. Please try again.";
            header("Location: ../page/login/login.php");
            exit();
        }
    } else {
        // Username tidak ditemukan
        $_SESSION['error'] = "Username not found. Please register first.";
        header("Location: ../page/login/login.php");
        exit();
    }
} else {
    echo "Invalid Request";
    exit();
}
?>
