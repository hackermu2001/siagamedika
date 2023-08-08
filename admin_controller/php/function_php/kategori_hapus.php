<?php
include '../../../koneksi.php';

if (isset($_POST['CatToDelete'])) {
    $CatToDelete = $_POST['CatToDelete'];

    // Lakukan proses penghapusan berdasarkan SKU_BRND yang diterima
    $query = "DELETE FROM kategori WHERE kode_kategori = '$CatToDelete'";
    mysqli_query($koneksi, $query);

    echo "Data berhasil dihapus"; // Pesan ini akan dikirim kembali ke skrip JavaScript
}
?>
