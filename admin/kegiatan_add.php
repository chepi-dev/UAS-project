<?php
// require_once '../auth/auth.php'; // proteksi admin
require_once '../config/koneksi.php'; // koneksi database
include 'partials/header-admin.php';
?>

<div class="wrapper">
    <div class="content container mt-5">
        <div class="container mt-4">
            <h2>Tambah Kegiatan Ekstrakurikuler</h2>
            <form action="proses/proses_kegiatan_add.php" method="POST">
                <div class="mb-3">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="jadwal" class="form-label">Jadwal</label>
                    <input type="text" class="form-control" id="jadwal" name="jadwal"
                        placeholder="Misal: Senin, 15.00 WIB" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?php include 'partials/footer-admin.php'; ?>