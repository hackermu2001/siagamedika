<?php
include '../koneksi.php';

$KodeBrand = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM brand WHERE KodeBrand = '$KodeBrand'");

mysqli_query($koneksi, "UPDATE produk SET KodeBrand=0 WHERE KodeBrand = '$KodeBrand'");

header("location:brand.php");

