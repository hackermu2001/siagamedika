<?php

// edit_nama_brand.php
include '../../../koneksi.php';

$skuToEdit = $_POST['skuToEdit'];
$updatedNamaBrand = mysqli_real_escape_string($koneksi, $_POST['updatedNamaBrand']);

// Mendapatkan data tanggal saat ini
$currentDate = date("Y-m-d");

// Update data nama dan tanggal
mysqli_query($koneksi, "UPDATE brand SET NamaBrand='$updatedNamaBrand', Tanggal='$currentDate' WHERE SKU_BRND='$skuToEdit'");
echo "NamaBrand berhasil diperbarui";
?>