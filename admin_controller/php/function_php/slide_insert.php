<?php
include '../koneksi.php';

$NamaSlide = $_POST['NamaSlide'];
$LinkGambar = $_POST['LinkGambar'];

mysqli_query($koneksi, "INSERT INTO slide (KodeSlide,NamaSlide,Gambar) 
                    VALUES(NULL,'$NamaSlide','$LinkGambar'");

header("location:slide.php");