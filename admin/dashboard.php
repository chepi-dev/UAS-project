<?php
// sementara tidak pakai auth

require_once '../auth/session.php';
require_once '../config/koneksi.php';
include 'partials/header-admin.php';
?>
<link rel="stylesheet" href="../assets/css/admin-style.css">

<div class="wrapper">
    <div class="content container mt-3">
        <div class="container mt-4">
            <h2>Daftar Kegiatan Ekstrakurikuler</h2>
            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Deskripsi</th>
                        <th>Jadwal</th>
                        <th>Aksi</th> <!-- Tambahan kolom Aksi -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = "SELECT * FROM kegiatan";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama_kegiatan']) ?></td>
                        <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                        <td><?= htmlspecialchars($row['jadwal']) ?></td>
                        <td>
                            <a href="kegiatan_edit.php?id=<?= $row['id'] ?> " class="btn btn-outline-warning">Edit</a>
                            <a href="proses/proses_kegiatan_delete.php?id=<?= $row['id'] ?>"
                                onclick="return confirm('Yakin ingin menghapus kegiatan ini?')"
                                class="btn btn-outline-danger btn-sm">Delete</a>

                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include 'partials/footer-admin.php'; ?>