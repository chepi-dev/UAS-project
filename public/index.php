<?php
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EkskulKita - Portal Ekstrakurikuler Sekolah</title>
    <style>
    html {
        scroll-behavior: smooth;
    }
    </style>
</head>

<body>
    <!-- HEADER NAVIGATION -->
    <?php require_once '../includes/header.php'; ?>

    <!-- HERO SECTION -->
    <section class="bg-primary text-white py-5 text-center">
        <div class="container">
            <h1>Selamat Datang di EkskulKita</h1>
            <p class="lead">Portal informasi ekstrakurikuler SMA Teladan Nusantara</p>
        </div>
    </section>

    <!-- TENTANG -->
    <section id="tentang" class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4">Tentang EkskulKita</h2>
            <p>
                EkskulKita adalah platform informasi resmi ekstrakurikuler SMA Teladan Nusantara. Di sini, siswa dapat
                menemukan informasi lengkap, jadwal, dan pendaftaran kegiatan ekskul seperti olahraga, seni, teknologi,
                dan lainnya.
            </p>
        </div>
    </section>


    <!-- KEGIATAN -->
    <section id="kegiatan" class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Daftar Kegiatan Ekstrakurikuler</h2>
            <div class="row text-center">
                <?php

                $query = "SELECT * FROM kegiatan";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $gambar = !empty($row['gambar']) ? $row['gambar'] : 'default.jpg';
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <img src="image.php?src=<?= urlencode($gambar) ?>" class="card-img-top"
                            alt="<?= htmlspecialchars($row['nama_kegiatan']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['nama_kegiatan']) ?></h5>
                            <p class="card-text"><?= substr(htmlspecialchars($row['deskripsi']), 0, 100) ?>...</p>
                            <a href="daftar.php?ekskul=<?= urlencode($row['nama_kegiatan']) ?>"
                                class="btn btn-primary">Daftar</a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo '<p class="text-muted">Belum ada kegiatan tersedia.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- JADWAL EKSKUL -->
    <section id="jadwal" class="bg-light py-5 text-center">
        <div class="container">
            <h2 class="mb-4">Jadwal Kegiatan Ekskul</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-start">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Ekskul</th>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../config/koneksi.php';
                        $query = "SELECT * FROM kegiatan ORDER BY jadwal ASC";
                        $result = mysqli_query($conn, $query);
                        $no = 1;
                        $hari_arr = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $timestamp = strtotime($row['jadwal']);
                            $hari = $hari_arr[date('w', $timestamp)];
                            $jam = date('H:i', $timestamp);
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama_kegiatan']) ?></td>
                            <td><?= $hari ?></td>
                            <td><?= $jam ?> WIB</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>



    <!-- KONTAK / FOOTER SECTION -->
    <?php include '../includes/footer.php'; ?>
</body>

</html>