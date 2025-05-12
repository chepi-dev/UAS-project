<?php
// require_once '../../auth/auth.php';
require_once '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama_kegiatan']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $jadwal = htmlspecialchars($_POST['jadwal']);

    $query = "INSERT INTO kegiatan (nama_kegiatan, deskripsi, jadwal) VALUES ('$nama', '$deskripsi', '$jadwal')";

    if (mysqli_query($conn, $query)) {
        header("Location: ../dashboard.php?status=sukses");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
} else {
    echo "Akses tidak diizinkan.";
}