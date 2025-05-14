<?php
include '../config/koneksi.php';

$nama = $_POST['nama_lengkap'];
$kelas = $_POST['kelas'];
$no_hp = $_POST['no_hp'];
$ekskul_id = $_POST['id_kegiatan'];
$tanggal_daftar = date('Y-m-d');

$query = "INSERT INTO pendaftar (nama_lengkap, kelas, no_hp, id_kegiatan, tanggal_daftar)
          VALUES ('$nama', '$kelas', '$no_hp', $ekskul_id, '$tanggal_daftar')";

if (mysqli_query($conn, $query)) {
    echo "Pendaftaran berhasil! <a href='index.php'>Kembali</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/public-style.css">
</head>
<body>
    
</body>
</html>