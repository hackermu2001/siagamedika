<?php 
include '../../koneksi.php';

$KodeProduk = $_GET['Kode'];
$NamaProduk = $_POST['NamaProduk'];
$Kategori = $_POST['Kategori'];
$Keterangan = $_POST['Deskripsi'];
$Gambar = $_POST['LinkGambar'];
$Harga = $_POST['numHarga'];
$Brand = $_POST['Brand'];


mysqli_query($koneksi, "UPDATE produk SET NamaProduk='$NamaProduk' WHERE KodeProduk='$KodeProduk'");
mysqli_query($koneksi, "UPDATE produk SET kode_kategori='$Kategori' WHERE KodeProduk='$KodeProduk'");
mysqli_query($koneksi, "UPDATE produk SET SKU_BRND='$Brand' WHERE KodeProduk='$KodeProduk'");
mysqli_query($koneksi, "UPDATE produk SET Harga='$Harga' WHERE KodeProduk='$KodeProduk'");

if($Gambar!=null || $Gambar!=""){
    mysqli_query($koneksi, "UPDATE produk SET Gambar='$Gambar' WHERE KodeProduk='$KodeProduk'");
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

header("location: ../../product_edit.php");


