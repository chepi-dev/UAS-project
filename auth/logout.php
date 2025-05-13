<?php
session_start();
session_unset(); // Menghapus semua session
session_destroy(); // Menghancurkan session

// Menghapus cookie session jika ada
setcookie(session_name(), '', time() - 3600, '/'); // Menghapus cookie session yang tersisa

header('Location: ../auth/login.php'); // Arahkan ke login setelah logout
exit;