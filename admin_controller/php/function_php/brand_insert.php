<?php
include '../../../koneksi.php';

$NamaBrand = $_POST['txtNamaBrand'];
$Tanggal = $_POST['tanggal_post'];
$SKU_BRND = $_POST['sku_brand'];

mysqli_query($koneksi, "INSERT INTO brand (NamaBrand, Tanggal, SKU_BRND) VALUES ('$NamaBrand','$Tanggal','$SKU_BRND')");

header("location:../../brand.php");

?>