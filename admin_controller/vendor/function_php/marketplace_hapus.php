<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM marketplace WHERE KodeMarket='$id'");
$d = mysqli_fetch_assoc($data);
$Foto = $d['Logo'];
unlink("../gambar/slide/$Foto");

mysqli_query($koneksi, "DELETE FROM marketplace WHERE KodeMarket='$id'");

header("location : marketplace.php");