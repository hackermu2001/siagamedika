<?php 
include './koneksi.php'

$NamaKategori = $_POST['NamaKategori'];

mysqli_query($koneksi, "INSERT INTO kategori (KodeKategori,NamaKategori) VALUES('','$NamaKategori')");

header("location:kategori.php");