<?php
$host = 'localhost';
$username = 'root'; 
$password = '';     
$database = 'pandawara'; // nama database

// membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// menegecek  koneksi
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
