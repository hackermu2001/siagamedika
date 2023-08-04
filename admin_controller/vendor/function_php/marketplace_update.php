<?php
include '../koneksi.php';

$KodeMarket = ['KodeMarket'];
$NamaMarket = ['NamaMarket'];

$rand = rand();
$allowed = array('gif','png','jpg','jpeg');

$filename = $_FILES['Foto']['name'];

mysqli_query($koneksi, "UPDATE marketplace SET NamaMarket='$NamaMarket' WHERE KodeMarket='$KodeMarket'");

if($filename!=null || $filename!=""){

    $FotoLama = mysqli_query($koneksi, "SELECT Logo FROM marketplace WHERE KodeMarket='$KodeMarket'");
    $FL = mysqli_fetch_assoc($FotoLama);
    $Foto = $FL['Logo'];
    unlink("../gambar/marketplace/$Foto");

    move_uploaded_file($_FILES['Foto']['tmp_name'],'../gambar/slide/'.$rand.'_'.$filename);
    $file_gambar = $rand.'_'.$filename;

    mysqli_query($koneksi,"UPDATE marketplace SET Logo='$file_gambar' WHERE KodeMarket='$KodeMarket'");
}

header("lcoation: marketpalce.php");