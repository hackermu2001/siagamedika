<?php 
include "../koneksi.php";

$LastKodeProduk = mysqli_query($koneksi,"SELECT KodeProduk FROM produk WHERE 
                    KodeProduk = (SELECT MAX(KoeProduk) FROM produk)");
$LKP = mysqli_fetch_assoc($LastKodeProduk);
$KodeProduk = $LKP['KodeProduk'];

$NamaSpec1 = $_POST['NamaSpec1'];
$Keterangan1 = $_POST['Keterangan1'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec1','$Keterangan1'");

$NamaSpec2 = $_POST['NamaSpec2'];
$Keterangan2 = $_POST['Keterangan2'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec2','$Keterangan2'");

$NamaSpec3 = $_POST['NamaSpec3'];
$Keterangan3 = $_POST['Keterangan3'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec3','$Keterangan3'");

$NamaSpec4 = $_POST['NamaSpec4'];
$Keterangan4 = $_POST['Keterangan4'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec4','$Keterangan4'");

$NamaSpec5 = $_POST['NamaSpec5'];
$Keterangan5 = $_POST['Keterangan5'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec5','$Keterangan5'");

$NamaSpec6 = $_POST['NamaSpec6'];
$Keterangan6 = $_POST['Keterangan6'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec6','$Keterangan6'");

$NamaSpec7 = $_POST['NamaSpec7'];
$Keterangan7 = $_POST['Keterangan7'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec7','$Keterangan7'");

$NamaSpec8 = $_POST['NamaSpec8'];
$Keterangan8 = $_POST['Keterangan8'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec8','$Keterangan8'");

$NamaSpec9 = $_POST['NamaSpec9'];
$Keterangan9 = $_POST['Keterangan9'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec9','$Keterangan9'");

$NamaSpec10 = $_POST['NamaSpec10'];
$Keterangan10 = $_POST['Keterangan10'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec10','$Keterangan10'");

$NamaSpec11 = $_POST['NamaSpec11'];
$Keterangan11 = $_POST['Keterangan11'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec11','$Keterangan11'");

$NamaSpec12 = $_POST['NamaSpec12'];
$Keterangan12 = $_POST['Keterangan12'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec12','$Keterangan12'");

$NamaSpec13 = $_POST['NamaSpec13'];
$Keterangan13 = $_POST['Keterangan13'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec13','$Keterangan13'");

$NamaSpec14 = $_POST['NamaSpec14'];
$Keterangan14 = $_POST['Keterangan14'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec14','$Keterangan14'");

$NamaSpec1 = $_POST['NamaSpec15'];
$Keterangan1 = $_POST['Keterangan15'];
mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeSpesifikasi,KodeProduk,NamaSpesifikasi,Keterangan) 
            VALUES (NULL,'$KodeProduk','$NamaSpec15','$Keterangan15'");

header ("location : produk.php");