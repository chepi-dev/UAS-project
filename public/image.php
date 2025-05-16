<?php
// Pastikan parameter src tersedia
if (!isset($_GET['src']) || empty($_GET['src'])) {
    http_response_code(400);
    echo "Parameter 'src' tidak ditemukan.";
    exit;
}

$filename = basename($_GET['src']); // aman dari path traversal
$filepath = realpath(__DIR__ . '/../uploads/' . $filename); // naik satu level dari public ke uploads

// Validasi keamanan & keberadaan file
if (!$filepath || strpos($filepath, realpath(__DIR__ . '/../uploads/')) !== 0 || !file_exists($filepath)) {
    http_response_code(404);
    echo 'File tidak ditemukan.';
    exit;
}

// Ambil dan tampilkan gambar
$mime = mime_content_type($filepath);
header("Content-Type: $mime");
header("Content-Length: " . filesize($filepath));
readfile($filepath);
exit;