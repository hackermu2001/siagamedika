<?php 

include '../koneksi.php';

$NamaMarket = $_POST['NamaMarket'];

$rand = rand();
$allowed = array('gif','png','jpg','jpeg');

$filename = $_FILES['Foto']['name'];

mysqli_query($koneksi, "INSERT INTO marketplace (KodeMarket,NamaMarket,Logo) VALUES (NULL,'$NamaMarket',''");

$LastKodeMarket = mysqli_query($koneksi, "SELECT KodeMarket FROM marketplace WHERE KodeMarket=
(SELECT MAX(KodeMarket) FROM marketplace)");
$LKM = mysqli_fetch_assoc($LastKodeMarket);
$KodeMarket = $LKM['KodeMarket'];

if($filename!=null || $filename!=""){
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(in_array($ext, $allowed)){
        move_uploaded_file($_FILES['Foto']['tmm_name'],'../gambar/marketplace/'.$rand.'_'.$filename);

        $file_gamber = $rand.'_'.$filename;

        mysqli_query($koneksi, "UPDATE marketplace SET Logo='$file_gamber' WHERE KodeMarket='$KodeMarket'");
    }
}

header("location: marketplace.php");