<?php
// footer.php - File yang berisi footer website ekstrakurikuler

$site_name = "EkskulKita";
$school_name = "SMA Teladan Nusantara";
$copyright_year = date("Y");

$ekskul_categories = [
    "Olahraga" => "kategori.php?cat=olahraga",
    "Seni" => "kategori.php?cat=seni",
    "Akademik" => "kategori.php?cat=akademik",
    "Teknologi" => "kategori.php?cat=teknologi",
    "Bahasa" => "kategori.php?cat=bahasa",
    "Keagamaan" => "kategori.php?cat=keagamaan"
];

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

// Newsletter
$newsletter_submit = false;
$email = "";
$email_error = "";

if (isset($_POST['subscribe'])) {
    $newsletter_submit = true;
    $email = $_POST['email'];

    if (empty($email)) {
        $email_error = "Email tidak boleh kosong";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Format email tidak valid";
    } else {
        // Simpan ke database (implementasi sesuai kebutuhan)
    }
}
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

            <!-- Kategori Ekskul -->
            <div class="col-md-2 mb-4">
                <h6>Kategori Ekskul</h6>
                <ul class="list-unstyled">
                    <?php foreach ($ekskul_categories as $category => $url): ?>
                    <li><a href="<?= $url; ?>" class="text-white-50 text-decoration-none"><?= $category; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Ekskul Populer -->
            <div class="col-md-2 mb-4">
                <h6>Ekskul Populer</h6>
                <ul class="list-unstyled">
                    <?php foreach ($popular_ekskul as $ekskul => $url): ?>
                    <li><a href="<?= $url; ?>" class="text-white-50 text-decoration-none"><?= $ekskul; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Kontak + Newsletter -->
            <div class="col-md-4 mb-4">
                <h6>Kontak Kami</h6>
                <ul class="list-unstyled text-white-50 small">
                    <?php foreach ($contact_info as $label => $value): ?>
                    <li><strong><?= $label; ?>:</strong> <?= $value; ?></li>
                    <?php endforeach; ?>
                </ul>

                <form method="post" class="mt-3">
                    <label for="email" class="form-label">Berlangganan Newsletter</label>
                    <div class="input-group mb-2">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Anda"
                            value="<?= htmlspecialchars($email); ?>">
                        <button class="btn btn-primary" type="submit" name="subscribe">Langganan</button>
                    </div>
                    <?php if ($newsletter_submit && empty($email_error)): ?>
                    <div class="text-success small">Terima kasih telah berlangganan!</div>
                    <?php elseif (!empty($email_error)): ?>
                    <div class="text-danger small"><?= $email_error; ?></div>
                    <?php endif; ?>
                </form>
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