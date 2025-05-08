<?php
$localhost = 'localhost';
$user = 'root';
$pass = '';
$database = 'ekskul';

$db = mysqli_connect($localhost, $user, $pass, $database);

if (!$db) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}