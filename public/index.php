<?php
include '../config/koneksi.php';
include '../includes/header.php';

$query = mysqli_query($conn, "SELECT * FROM kegiatan");
?>
<head>
    <link rel="stylesheet" href="../assets/public-style.css">
</head>

    <h2>Daftar Ekstrakurikuler</h2>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <li>
            <strong><?= $row['nama_kegiatan']; ?></strong><br>
        <?= $row['deskripsi']; ?><br>
    </li>
<?php } ?>
</ul>

    <a href="daftar.php">Daftar Ekskul</a>

<?php include '../includes/footer.php'; ?>