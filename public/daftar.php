<?php
include '../Config/koneksi.php';
include '../includes/header.php';

$ekskul = mysqli_query($conn, "SELECT * FROM kegiatan");
?>

<head>
    <link rel="stylesheet" href="../assets/public-style.css">
</head>

<h2>Formulir Pendaftaran Ekstrakurikuler</h2>
<form action="proses_daftar.php" method="post">
    Nama Siswa: <input type="text" name="nama_lengkap" required><br>
    Kelas: <input type="text" name="kelas" required><br>
    No HP: <input type="text" name="no_hp" required><br>
    Pilih Ekskul:
    <select name="id_kegiatan" required>
        <option value="">--Pilih--</option>
        <?php while ($row = mysqli_fetch_assoc($ekskul)) { ?>
            <option value="<?= $row['id']; ?>"><?= $row['nama_kegiatan']; ?></option>
        <?php } ?>
    </select><br>
    <button type="submit">Daftar</button>
</form>

<?php include '../includes/footer.php'; ?>