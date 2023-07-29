<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM slide WHERE KodeSlide='$id'");
$d = mysqli_fetch_assoc($data);
$Foto = $d['Gambar'];
unlink("../gambar/slide/$Foto");

mysqli_query($koneksi, "DELETE FROM slide WHERE KodeSlide='$id'");
header("location: slide.php");

