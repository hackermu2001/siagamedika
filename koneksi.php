<?php
// Production Siagamedika
$koneksi = mysqli_connect("194.163.42.23", "u9973847_siagamedika", "S1i2A3g4A5", "u9973847_siagamedika");

// UAT Siagamedika
// $koneksi = mysqli_connect("localhost", "root", "", "siagamedika");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi sudah oke"; // Tambahkan pesan ini jika koneksi berhasil
}
?>
