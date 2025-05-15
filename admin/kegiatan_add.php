<?php
require_once '../auth/session.php';
require_once '../config/koneksi.php'; // koneksi database
include 'partials/header-admin.php';
?>

<div class="wrapper">
    <div class="content container mt-5">
        <div class="container mt-4">
            <h2>Tambah Kegiatan Ekstrakurikuler</h2>
            <form action="controllers/proses_kegiatan_add.php" method="POST">
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
                    <input type="datetime-local" class="form-control" id="jadwal" name="jadwal" required>
                </div>

                <p id="jadwalFormatted" class="mt-2 text-muted"></p>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<script>
const jadwalInput = document.getElementById('jadwal');
const jadwalFormatted = document.getElementById('jadwalFormatted');

jadwalInput.addEventListener('change', () => {
    const date = new Date(jadwalInput.value);
    if (isNaN(date)) {
        jadwalFormatted.textContent = '';
        return;
    }

    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const months = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    const day = days[date.getDay()];
    const jam = date.toTimeString().slice(0, 5);
    const tanggal = date.getDate();
    const bulan = months[date.getMonth()];

    jadwalFormatted.textContent = `${day}, ${jam}, ${tanggal} ${bulan}`;
});
</script>
<?php include 'partials/footer-admin.php'; ?>