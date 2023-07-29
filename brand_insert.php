<?php
include '../koneksi.php';

$NamaBrand = $_POST['txtNamaBrand'];

mysqli_query($koneksi, "INSERT INTO brand (NamaBrand) VALUES ('$NamaBrand')");

header("location:brand.php");

