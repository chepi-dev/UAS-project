<?php
include '../Config/koneksi.php';
include '../includes/header.php';

$ekskul = mysqli_query($conn, "SELECT * FROM kegiatan");
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg rounded-4">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Formulir Pendaftaran Ekstrakurikuler</h3>
                    <form action="proses_daftar.php" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp" required>
                        </div>
                        <div class="mb-4">
                            <?php
                            // Ambil ekskul dari parameter jika ada
                            $ekskul_terpilih = isset($_GET['ekskul']) ? urldecode($_GET['ekskul']) : '';
                            ?>
                            <!-- Menampilkan notifikasi jika ada ekskul yang dipilih -->
                            <?php if ($ekskul_terpilih): ?>
                            <div class="alert alert-info">
                                Anda sedang mendaftar untuk ekstrakurikuler:
                                <strong><?= htmlspecialchars($ekskul_terpilih); ?></strong>
                            </div>
                            <?php endif; ?>
                            <!-- Form Dropdown Ekskul -->
                            <label for="id_kegiatan" class="form-label">Pilih Ekskul</label>
                            <select name="id_kegiatan" class="form-select" id="id_kegiatan" required>
                                <option value="">-- Pilih Ekstrakurikuler --</option>
                                <?php while ($row = mysqli_fetch_assoc($ekskul)) {
                                    $selected = ($ekskul_terpilih == $row['nama_kegiatan']) ? 'selected' : '';
                                ?>
                                <option value="<?= $row['id']; ?>" <?= $selected; ?>>
                                    <?= htmlspecialchars($row['nama_kegiatan']); ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>