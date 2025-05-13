<?php
session_start();
require_once '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cek berdasarkan username saja
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    // Verifikasi password hash
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: ../admin/dashboard.php");
        exit;
    }
}

// Jika gagal login
header("Location: login.php?error=Username atau password salah");
exit;