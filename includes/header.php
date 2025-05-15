<?php
// header.php - File yang berisi header website ekstrakurikuler

// Variabel untuk pengaturan dinamis
$site_name = "EkskulKita";
$tagline = "Kembangkan Bakat, Raih Prestasi";

// Daftar menu navigasi
$nav_items = [
    "Beranda" => "index.php",
    "Daftar Ekskul" => "daftar-ekskul.php",
    "Jadwal" => "jadwal.php",
    "Prestasi" => "prestasi.php",
    "Galeri" => "galeri.php",
    "Kontak" => "kontak.php"
];

// Cek halaman aktif
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name; ?> - Portal Ekstrakurikuler Sekolah</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* HEADER STYLES */
        header {
            background: linear-gradient(135deg, #4a90e2, #5637d7);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .header-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo img {
            width: 50px;
            height: 50px;
            background-color: white;
            border-radius: 50%;
            padding: 5px;
        }
        
        .logo-text h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }
        
        .logo-text p {
            font-size: 0.85rem;
            opacity: 0.9;
        }
        
        nav ul {
            list-style: none;
            display: flex;
            gap: 2rem;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
            position: relative;
        }
        
        nav ul li a.active {
            font-weight: 700;
        }
        
        nav ul li a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: white;
            transition: width 0.3s ease;
        }
        
        nav ul li a.active:after {
            width: 100%;
        }
        
        nav ul li a:hover:after {
            width: 100%;
        }
        
        .header-actions {
            display: flex;
            gap: 1rem;
        }
        
        .header-actions button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .login-btn {
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }
        
        .login-btn:hover {
            background-color: white;
            color: #4a90e2;
        }
        
        .register-btn {
            background-color: white;
            color: #4a90e2;
        }
        
        .register-btn:hover {
            background-color: #f0f0f0;
        }
        
        /* MAIN CONTENT STYLES */
        main {
            flex: 1;
            padding: 2rem 0;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .content-placeholder {
            background-color: #f5f5f5;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            color: #666;
        }
        
        /* FOOTER STYLES */
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 3rem 0 1rem;
        }
        
        .footer-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-section h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: #4a90e2;
        }
        
        .footer-section p {
            margin-bottom: 1rem;
            font-size: 0.9rem;
            line-height: 1.5;
            opacity: 0.8;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section ul li {
            margin-bottom: 0.75rem;
        }
        
        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .footer-section ul li a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .contact-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-icons a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            text-align: center;
            line-height: 36px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background-color: #4a90e2;
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            text-align: center;
            font-size: 0.85rem;
            opacity: 0.7;
        }
        
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
                margin: 1rem 0;
            }
            
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 480px) {
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="img/logo.png" alt="Logo Ekstrakurikuler" onerror="this.src='https://via.placeholder.com/50'">
                <div class="logo-text">
                    <h1><?php echo $site_name; ?></h1>
                    <p><?php echo $tagline; ?></p>
                </div>
            </div>
            
            <nav>
                <ul>
                    <?php foreach($nav_items as $name => $url): ?>
                        <li>
                            <a href="<?php echo $url; ?>" <?php if($current_page == $url) echo 'class="active"'; ?>>
                                <?php echo $name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            
           
            </div>
        </div>
    </header>