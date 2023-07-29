<?php
include '../koneksi.php';

$NamaSlide = $_POST['NamaSlide'];

$rand = rand();
$allowed = array('gif','png','jpg','jpeg');

$filename = $_FILES['Foto']['name'];

mysqli_query($koneksi, "INSERT INTO slide (KodeSlide,NamaSlide,Gambar) VALUES(NULL,'$NamaSlide',''");

$LastKodeSlide = mysqli_query($koneksi, "SELECT KodeSlide FROM slide WHERE KodeSlide=(SELECT MAX(KodeSlide) FROM slide)");
$LKS = mysqli_fetch_assoc($LastKodeSlide);
$KodeSlide = $LKS['KodeSlide'];

if($filename!=null || $filename!=""){
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(in_array($ext, $allowed)){
        move_uploaded_file($_FILES['FOto']['tmp_name'], '../gambar/slide/'.$rand.'_'.$filename);
        $file_gambar = $rand.'_'.$filename;
        
        mysqli_query($koneksi, "UPDATE slide SET Gambar'$file_gambar' WHERE KodeSlide='$KodeSlide'");
    }
}

header("location:slide.php");