<?php
$localhost = 'localhost';
$user = 'root';
$pass = '';
$database = 'ekskul';

$conn = mysqli_connect($localhost, $user, $pass, $database);

if (!$conn) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}