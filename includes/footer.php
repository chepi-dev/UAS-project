<?php
// footer.php - File yang berisi footer website ekstrakurikuler

// Variabel untuk pengaturan dinamis
$site_name = "EkskulKita";
$copyright_year = date("Y");
$school_name = "SMA Teladan Nusantara";

// Daftar kategori ekstrakurikuler
$ekskul_categories = [
    "Olahraga" => "kategori.php?cat=olahraga",
    "Seni" => "kategori.php?cat=seni",
    "Akademik" => "kategori.php?cat=akademik",
    "Teknologi" => "kategori.php?cat=teknologi",
    "Bahasa" => "kategori.php?cat=bahasa",
    "Keagamaan" => "kategori.php?cat=keagamaan"
];

// Daftar ekskul populer
$popular_ekskul = [
    "Basket" => "detail.php?id=1",
    "Paduan Suara" => "detail.php?id=5",
    "Robotik" => "detail.php?id=12",
    "Fotografi" => "detail.php?id=8",
    "English Club" => "detail.php?id=15"
];

// Informasi kontak
$contact_info = [
    "Alamat" => "Jl. Pendidikan No. 123, Jakarta Selatan",
    "Telepon" => "(021) 1234-5678",
    "Email" => "info@ekskulkita.sch.id",
    "Jam Operasional" => "Senin - Jumat: 08.00 - 16.00 WIB"
];

// Media sosial
$social_media = [
    "F" => "https://facebook.com/ekskulkita",
    "T" => "https://twitter.com/ekskulkita",
    "I" => "https://instagram.com/ekskulkita",
    "Y" => "https://youtube.com/ekskulkita"
];
?>

<!-- FOOTER -->
<footer>
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Tentang <?php echo $site_name; ?></h3>
                <p><?php echo $site_name; ?> adalah platform yang menyediakan informasi lengkap tentang kegiatan ekstrakurikuler di <?php echo $school_name; ?>. Kami berkomitmen untuk membantu siswa mengembangkan bakat dan potensi mereka di luar kegiatan akademik.</p>
                <div class="social-icons">
                    <?php foreach($social_media as $icon => $url): ?>
                        <a href="<?php echo $url; ?>" target="_blank"><?php echo $icon; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Kategori Ekskul</h3>
                <ul>
                    <?php foreach($ekskul_categories as $category => $url): ?>
                        <li><a href="<?php echo $url; ?>"><?php echo $category; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Ekskul Populer</h3>
                <ul>
                    <?php foreach($popular_ekskul as $ekskul => $url): ?>
                        <li><a href="<?php echo $url; ?>"><?php echo $ekskul; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Kontak Kami</h3>
                <?php foreach($contact_info as $label => $value): ?>
                    <div class="contact-info">
                        <strong><?php echo $label; ?>:</strong> <?php echo $value; ?>
                    </div>
                <?php endforeach; ?>
                
                <?php
                // Form berlangganan newsletter
                $newsletter_submit = false;
                $email = "";
                $email_error = "";
                
                if(isset($_POST['subscribe'])) {
                    $newsletter_submit = true;
                    $email = $_POST['email'];
                    
                    if(empty($email)) {
                        $email_error = "Email tidak boleh kosong";
                    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $email_error = "Format email tidak valid";
                    } else {
                        // Kode untuk menyimpan email ke database
                        // ...
                    }
                }
                ?>
                
                <form action="" method="post" class="newsletter-form">
                    <h4>Berlangganan Newsletter</h4>
                    <?php if($newsletter_submit && empty($email_error)): ?>
                        <p style="color: #4aca9f;">Terima kasih telah berlangganan!</p>
                    <?php else: ?>
                        <input type="email" name="email" placeholder="Alamat Email Anda" value="<?php echo $email; ?>">
                        <?php if(!empty($email_error)): ?>
                            <p style="color: #ff6b6b;"><?php echo $email_error; ?></p>
                        <?php endif; ?>
                        <button type="submit" name="subscribe">Langganan</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo $copyright_year; ?> <?php echo $site_name; ?>. Hak Cipta Dilindungi. | Dibuat dengan <span style="color: #ff6b6b;">&hearts;</span> di <?php echo $school_name; ?></p>
        </div>
    </div>
</footer>

</body>
</html>