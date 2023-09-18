<?php
// Production Siagamedika
$koneksi = mysqli_connect("localhost", "u9973847_admin", "3SlK,tBxSHNI", "u9973847_siagamedika");

// UAT Siagamedika
// $koneksi = mysqli_connect("localhost", "root", "", "siagamedika");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
