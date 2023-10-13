<?php
require 'vendor/autoload.php'; // Pastikan autoloader dari Composer sudah di-require
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__); // Sesuaikan dengan path ke file .env
$dotenv->load();

$databaseHost = $_ENV['DB_HOST'];
$databaseUsername = $_ENV['DB_USER'];
$databasePassword = $_ENV['DB_PASSWORD'];
$databaseName = $_ENV['DB_NAME'];

$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
