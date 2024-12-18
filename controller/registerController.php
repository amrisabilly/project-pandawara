<?php
include('../config/database.php');
session_start();

// Fungsi untuk registrasi
$username = $_POST['username'];
$password = $_POST['password'];

//  Memasukkan data ke tabel 
$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Registrasi berhasil, arahkan ke halaman login
    $_SESSION["username"] = $username;
    echo "<script>alert('Registrasi berhasil! Silakan login.');</script>";
    header('Location: ../page/login/login.html');
    exit();
} else {
    // Registrasi gagal, arahkan kembali ke halaman registrasi
    echo "<script>alert('Registrasi gagal! Silakan coba lagi.');</script>";
    header('Location: ../page/login/registrasi.html');
    exit();
}

?>
