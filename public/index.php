<?php
include '../config/koneksi.php';
include '../includes/header.php';

$query = mysqli_query($conn, "SELECT * FROM kegiatan");
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Kegiatan Ekstrakurikuler</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Jadwal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama_kegiatan']); ?></td>
                        <td><?= htmlspecialchars($row['deskripsi']); ?></td>
                        <td><?= htmlspecialchars($row['jadwal']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <a href="daftar.php" class="btn btn-primary">Daftar Ekskul Sekarang</a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>