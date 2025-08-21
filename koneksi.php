<?php
$host = "localhost"; // Atau alamat server database
$user = "root"; // Username
$pass = ""; // Password
$dbname = "pramuka_web"; // Nama database

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
