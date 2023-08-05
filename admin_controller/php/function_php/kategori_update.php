<?php

include '../koneksi.php';

$KodeKategori = $_POST['id'];
$NamaKategori = $_POST['NamaKategori'];

mysqli_query($koneksi, "UPDATE kategori SET NamaKategori='$NamaKategori' WHERE KodeKategori='$KodeKategori'");

header("location:kategori.php");

