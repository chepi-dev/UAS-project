<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../auth/login.php?error=Harap login terlebih dahulu');
    exit;
}