<?php 
include '../../koneksi.php';

$KodeProduk = $_POST['KodeProduk'];

$NamaProduk = $_POST['NamaProduk'];
$Kategori = $_POST['Kategori'];
$Brand = $_POST['Brand'];
$Harga = $_POST['Harga'];
$Gambar = $_POST['Gambar'];
$Keterangan = $_POST['Keterangan'];
$Tokopedia = $_POST['Tokopedia'];
$Blibli = $_POST['Blibli'];
$Shopee = $_POST['Shopee'];

mysqli_query($koneksi, "UPDATE produk SET NamaProduk='$NamaProduk' WHERE KodeProduk='$KodeProduk'");

if($Kategori!="" || $Kategori!=null){
    mysqli_query($koneksi, "UPDATE produk SET kode_kategori='$Kategori' WHERE KodeProduk='$KodeProduk'");
}

if($Brand!="" || $Brand!=null){
    mysqli_query($koneksi, "UPDATE produk SET SKU_BRND='$Brand' WHERE KodeProduk='$KodeProduk'");
}

mysqli_query($koneksi, "UPDATE produk SET Harga='$Harga', Gambar='$Gambar', Keterangan='$Keterangan', 
    Tokopedia='$Tokopedia',Blibli='$Blibli',Shopee='$Shopee' WHERE KodeProduk='$KodeProduk");

header("location: ../../product_edit.php");


