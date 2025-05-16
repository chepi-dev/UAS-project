<?php
// footer.php - File yang berisi footer website ekstrakurikuler

include '../config/koneksi.php';

$site_name = "EkskulKita";
$school_name = "SMA Teladan Nusantara";
$copyright_year = date("Y");

$popular_ekskul = [
    "Basket" => "detail.php?id=1",
    "Paduan Suara" => "detail.php?id=5",
    "Robotik" => "detail.php?id=12",
    "Fotografi" => "detail.php?id=8",
    "English Club" => "detail.php?id=15"
];

$contact_info = [
    "Alamat" => "Jl. Pendidikan No. 123, Jakarta Selatan",
    "Telepon" => "(021) 1234-5678",
    "Email" => "info@ekskulkita.sch.id",
    "Jam Operasional" => "Senin - Jumat: 08.00 - 16.00 WIB"
];

$social_media = [
    "facebook" => "https://facebook.com/ekskulkita",
    "twitter" => "https://twitter.com/ekskulkita",
    "instagram" => "https://instagram.com/ekskulkita",
    "youtube" => "https://youtube.com/ekskulkita"
];

?>

<!-- FOOTER -->
<footer class="bg-dark text-white pt-5 mt-5" id="kontak">
    <div class="container">
        <div class="row">

            <!-- Tentang -->
            <div class="col-md-4 mb-4">
                <h5>Tentang <?= $site_name; ?></h5>
                <p><?= $site_name; ?> adalah platform kegiatan ekstrakurikuler di <?= $school_name; ?> untuk membantu
                    siswa mengembangkan potensi.</p>
                <div class="d-flex gap-2">
                    <?php foreach ($social_media as $icon => $url): ?>
                    <a href="<?= $url; ?>" target="_blank" class="text-white fs-4">
                        <i class="bi bi-<?= $icon; ?>"></i>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Ekskul Populer -->
            <div class="col-md-2 mb-4">
                <h6>Ekskul Populer</h6>
                <ul class="list-unstyled">
                    <li><a href="daftar.php?ekskul=<?= urlencode($row['nama_kegiatan']) ?>" class="text-white-50 text-decoration-none">Futsal</a></li>
                    <li><a href="daftar.php?id=1" class="text-white-50 text-decoration-none">Basket</a></li>
                    <li><a href="detail.php?id=22" class="text-white-50 text-decoration-none">Badminton</a></li>
                    <li><a href="detail.php?id=23" class="text-white-50 text-decoration-none">Musik</a></li>
                    <li><a href="detail.php?id=24" class="text-white-50 text-decoration-none">Esport Mobile Legend</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-6 mb-4">
                <h6>Kontak Kami</h6>
                <ul class="list-unstyled text-white-50 small">
                    <?php foreach ($contact_info as $label => $value): ?>
                    <li><strong><?= $label; ?>:</strong> <?= $value; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-top border-light mt-4 pt-3 text-center small text-white-50">
            &copy; <?= $copyright_year; ?> <?= $site_name; ?>. Dibuat dengan <span class="text-danger">&hearts;</span>
            di <?= $school_name; ?>.
        </div>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>