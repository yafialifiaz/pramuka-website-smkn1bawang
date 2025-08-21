<?php
require "koneksi.php"; // Pastikan file koneksi ke database sudah benar

// Ganti 'password_asli' dengan password yang ingin kamu hash dan simpan
$password_asli = 'password_asli';
$hashed_password = password_hash($password_asli, PASSWORD_BCRYPT);

// Masukkan ke dalam database
$username = 'username'; // Sesuaikan username
$stmt = $conn->prepare("UPDATE admin SET password = ? WHERE username = ?");
$stmt->bind_param("ss", $hashed_password, $username);

if ($stmt->execute()) {
    echo "Password berhasil di-hash dan disimpan di database.";
} else {
    echo "Gagal menyimpan password: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
