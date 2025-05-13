<?php
// auth check
// require_once '../auth/auth_check.php'; // optional kalau pakai sistem login

// mulai session jika belum
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Ekskul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="navbar-brand" href="dashboard.php">Admin Panel</a>

                <!-- Button to toggle navbar when screen size is small -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar content -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kegiatan_add.php">Tambah Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="peserta.php">Daftar Peserta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../auth/login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</body>