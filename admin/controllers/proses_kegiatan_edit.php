<?php
require_once '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama_kegiatan']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $jadwal = htmlspecialchars($_POST['jadwal']);

    $query = "UPDATE kegiatan SET 
                nama_kegiatan = '$nama',
                deskripsi = '$deskripsi',
                jadwal = '$jadwal'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: ../dashboard.php?status=updated");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
} else {
    echo "Akses tidak diizinkan.";
}
