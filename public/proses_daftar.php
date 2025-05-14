<?php
include '../config/koneksi.php';

// Ambil data dari form
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$no_hp = $_POST['no_hp'];
$ekskul_id = $_POST['id_kegiatan'];

// Validasi input sederhana (opsional tapi disarankan)
if (empty($nama) || empty($kelas) || empty($no_hp) || empty($ekskul_id)) {
    echo "Semua data harus diisi! <a href='daftar.php'>Kembali</a>";
    exit;
}

// Query insert (tanpa tanggal_daftar karena sudah default CURRENT_TIMESTAMP)
$query = "INSERT INTO pendaftar (nama, kelas, no_hp, id_kegiatan)
          VALUES ('$nama', '$kelas', '$no_hp', $ekskul_id)";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    echo "✅ Pendaftaran berhasil! <a href='index.php'>Kembali</a>";
} else {
    echo "❌ Terjadi kesalahan: " . mysqli_error($conn);
    echo "<br>Query: " . $query; // Debug opsional
}
