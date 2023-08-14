<?php
include '../../../koneksi.php';

if (isset($_POST['skuToDelete'])) {
    $skuToDelete = $_POST['skuToDelete'];

    // Lakukan proses penghapusan berdasarkan SKU_BRND yang diterima
    $query = "DELETE FROM brand WHERE SKU_BRND = '$skuToDelete'";
    mysqli_query($koneksi, $query);

    echo "Data berhasil dihapus"; // Pesan ini akan dikirim kembali ke skrip JavaScript
}
?>
