<?php
// require_once '../../auth/auth.php';
require_once '../config/koneksi.php';
include 'partials/header-admin.php';
?>

<div class="wrapper">
    <div class="content container mt-3">
        <div class="container mt-3">
            <h2>Daftar Peserta</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kegiatan</th>
                        <th>No HP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT p.*, k.nama_kegiatan FROM pendaftar p JOIN kegiatan k ON p.id_kegiatan = k.id";
                    $result = mysqli_query($conn, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['nama_kegiatan']) ?></td>
                        <td><?= htmlspecialchars($row['no_hp']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'partials/footer-admin.php'; ?>