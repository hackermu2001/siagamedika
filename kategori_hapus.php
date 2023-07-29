<?php
include '../koneksi.php';

$KodeKategori = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM kategori WHERE KodeKategori='$KodeKategori'");

mysqli_query($koneksi, "UPDATE produk SET Kategori=0 WHERE KodeKategori='$KodeKategori'");

header("location:kategori.php");

