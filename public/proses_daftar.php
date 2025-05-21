<?php
include '../config/koneksi.php';

// Ambil data dari form
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$no_hp = $_POST['no_hp'];
$ekskul_id = $_POST['id_kegiatan'];

// Validasi input
$valid = !empty($nama) && !empty($kelas) && !empty($no_hp) && !empty($ekskul_id);

// Ambil nama ekskul dari database
$query_ekskul = mysqli_query($conn, "SELECT nama_kegiatan FROM kegiatan WHERE id = $ekskul_id");
$data_ekskul = mysqli_fetch_assoc($query_ekskul);
$nama_ekskul = $data_ekskul ? $data_ekskul['nama_kegiatan'] : 'Tidak Diketahui';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Proses Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Hasil Pendaftaran</h4>

                        <?php if (!$valid): ?>
                            <div class="alert alert-danger">
                                ❌ Semua data harus diisi! <a href="daftar.php" class="alert-link">Kembali ke Form</a>.
                            </div>
                        <?php else: ?>
                            <?php
                            $query = "INSERT INTO pendaftar (nama, kelas, no_hp, id_kegiatan)
                                      VALUES ('$nama', '$kelas', '$no_hp', $ekskul_id)";
                            if (mysqli_query($conn, $query)): ?>
                                <div class="alert alert-success">
                                    ✅ <strong>Pendaftaran Berhasil!</strong> Berikut data yang kamu daftarkan:
                                </div>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item"><strong>Nama:</strong> <?= htmlspecialchars($nama); ?></li>
                                    <li class="list-group-item"><strong>Kelas:</strong> <?= htmlspecialchars($kelas); ?></li>
                                    <li class="list-group-item"><strong>No HP:</strong> <?= htmlspecialchars($no_hp); ?></li>
                                    <li class="list-group-item"><strong>Ekstrakurikuler:</strong>
                                        <?= htmlspecialchars($nama_ekskul); ?></li>
                                </ul>
                                <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    ❌ Terjadi kesalahan saat menyimpan data: <?= mysqli_error($conn); ?>
                                </div>
                                <a href="daftar.php" class="btn btn-secondary">Kembali ke Form</a>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>