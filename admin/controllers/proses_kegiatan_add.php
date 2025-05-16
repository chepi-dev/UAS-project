<?php
require_once '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama_kegiatan']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $jadwal = htmlspecialchars($_POST['jadwal']);

    // Cek apakah file gambar diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['gambar']['tmp_name'];
        $fileName = basename($_FILES['gambar']['name']);
        $uploadDir = '../../uploads/';
        $destPath = $uploadDir . $fileName;

        // Pindahkan file ke folder uploads
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // Insert data termasuk nama file gambar ke database
            $query = "INSERT INTO kegiatan (nama_kegiatan, deskripsi, jadwal, gambar) VALUES ('$nama', '$deskripsi', '$jadwal', '$fileName')";

            if (mysqli_query($conn, $query)) {
                header("Location: ../dashboard.php?status=sukses");
                exit;
            } else {
                echo "Gagal menyimpan data: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal mengunggah gambar. Pastikan folder uploads ada dan bisa ditulis.";
        }
    } else {
        echo "Gambar tidak diupload atau terjadi kesalahan upload.";
    }
} else {
    echo "Akses tidak diizinkan.";
}