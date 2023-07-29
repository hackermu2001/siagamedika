<?php
include '../koneksi.php';

$KodeSlide = $_POST['KodeSlide'];
$NamaSlide = $_POST['NamaSlide'];

$rand = rand();
$allowed = array('gif','png','jpg','jpeg');

$filename = $_FILES['Foto']['name'];

mysqli_query($koneksi, "UPDATE slide SET NamaSlide='$NamaSlide' WHERE KodeSlide='$KodeSlide'");

if($filename!=null || $filename!=""){
    
    $FotoLama = mysqli_query($koneksi, "SELECT Gambar FROM slide WHERE KodeSlide='$KodeSlide'");
    $FL = mysqli_fetch_assoc($FotoLama);
    $Foto = $FL['Gambar'];
    unlink("../gambar/slide/$Foto");
    
    move_uploaded_file($_FILES['Foto']['tmp_name'], '../gambar/slide/'.$rand.'_'.$filename);
    $file_gambar = $rand.'_'.$filename;
    
    mysqli_query($koneksi, "UPDATE slide SET Gambar='$file_gambar' WHERE KodeSlide='$KodeSlide'");
    
}

header("location: slide.php?id=$KodeSlide");
