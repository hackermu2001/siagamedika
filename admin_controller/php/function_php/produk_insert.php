<?php
include '../../../koneksi.php';

$NamaProduk = $_POST['NamaProduk'];
$Kategori = $_POST['Kategori'];
$Brand = $_POST['Brand'];
$Harga = $_POST['numHarga'];
$Keterangan = $_POST['Deskripsi'];

$LinkGambar = $_POST['LinkGambar'];

mysqli_query($koneksi, "INSERT INTO produk (KodeProduk,NamaProduk,kode_kategori,SKU_BRND,Harga,Gambar,Keterangan) 
                            VALUES (NULL,'$NamaProduk','$Kategori','$Brand','$Harga','','')");

$LastKodeProduk = mysqli_query($koneksi, "SELECT KodeProduk FROM produk WHERE 
                                    KodeProduk=(SELECT MAX(KodeProduk) FROM produk)");

$LKP = mysqli_fetch_assoc($LastKodeProduk);
$KodeProduk = $LKP['KodeProduk'];

if($LinkGambar!=null || $LinkGambar!=""){
    mysqli_query($koneksi, "UPDATE produk SET Gambar='$LinkGambar' WHERE KodeProduk='$KodeProduk'");
}
if($Keterangan!=null || $Keterangan!=""){
    mysqli_query($koneksi, "UPDATE produk SET Keterangan='$Keterangan' WHERE KodeProduk='$KodeProduk'");
}

$Tokopedia = $_POST['Tokopedia'];
if($Tokopedia!=null || $Tokopedia!=""){
    mysqli_query($koneksi, "UPDATE produk SET Tokopedia='$Tokopedia' WHERE KodeProduk='$KodeProduk'");
}

$Blibli = $_POST['Blibli'];
if($Blibli!=null || $Blibli!=""){
    mysqli_query($koneksi, "UPDATE produk SET Blibli='$Blibli' WHERE KodeProduk='$KodeProduk'");
}

$Shopee = $_POST['Shopee'];
if($Shopee!=null || $Shopee!=""){
    mysqli_query($koneksi, "UPDATE produk SET Shopee='$Shopee' WHERE KodeProduk='$KodeProduk'");
}

header("location:../../product_view.php");