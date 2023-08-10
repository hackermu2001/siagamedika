<?php
include '../../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $KodeProduk = $_POST['Kode'];
    $NamaProduk = $_POST['NamaProduk'];
    $Kategori = $_POST['Kategori'];
    $Keterangan = $_POST['Deskripsi'];
    $Gambar = $_POST['LinkGambar'];
    $Harga = $_POST['numHarga'];
    $Brand = $_POST['Brand'];
    $Tokopedia = $_POST['Tokopedia'];
    $Blibli = $_POST['Blibli'];
    $Shopee = $_POST['Shopee'];

    // Update the data in the database
    $sql = "UPDATE produk SET
                NamaProduk = ?,
                kode_kategori = ?,
                SKU_BRND = ?,
                Harga = ?,
                Gambar = ?,
                Keterangan = ?,
                Tokopedia = ?,
                Blibli = ?,
                Shopee = ?
            WHERE KodeProduk = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $NamaProduk, $Kategori, $Brand, $Harga, $Gambar, $Keterangan, $Tokopedia, $Blibli, $Shopee, $KodeProduk);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("location: ../../product_edit.php");
    } else {
        echo "Error updating product: " . mysqli_error($koneksi);
    }
} else {
    echo "Invalid request method";
}

header("location:../../product_edit.php");
?>
