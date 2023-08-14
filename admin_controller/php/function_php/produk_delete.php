<?php
include '../../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan penghapusan berdasarkan ID yang diberikan
    mysqli_query($koneksi, "DELETE FROM produk WHERE KodeProduk='$id'");

    // Redirect kembali ke halaman produk_edit.php
    header("location: ../../product_edit.php");
}
?>
