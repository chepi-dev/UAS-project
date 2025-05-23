<?php
require_once '../auth/session.php';
require_once '../config/koneksi.php';
include 'partials/header-admin.php';

$id = $_GET['id'];
$query = "SELECT * FROM kegiatan WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>
<div class="wrapper">
    <div class="content container mt-5">
        <div class="container mt-5">
            <h2>Edit Kegiatan</h2>
            <form action="controllers/proses_kegiatan_edit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <div class="mb-4">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                        value="<?= htmlspecialchars($data['nama_kegiatan']) ?>" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                        required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
                </div>

                <div class="mb-4">
                    <label for="jadwal" class="form-label">Jadwal</label>
                    <input type="text" class="form-control" id="jadwal" name="jadwal"
                        value="<?= htmlspecialchars($data['jadwal']) ?>" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Gambar Lama</label><br>
                    <?php if (!empty($data['gambar'])): ?>
                    <img src="../uploads/<?= htmlspecialchars($data['gambar']) ?>" alt="Gambar kegiatan"
                        class="img-thumbnail" style="max-width: 200px;">
                    <?php else: ?>
                    <p class="text-muted">Tidak ada gambar</p>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="form-label">Ganti Gambar (kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="dashboard.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?php include 'partials/footer-admin.php'; ?>