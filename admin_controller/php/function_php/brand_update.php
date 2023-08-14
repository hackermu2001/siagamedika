<?php
include '../../../koneksi.php';

$skuToEdit = $_POST['skuToEdit'];
$updatedNamaBrand = mysqli_real_escape_string($koneksi, $_POST['updatedNamaBrand']);

if (empty($updatedNamaBrand)) {
    echo "NamaBrand tidak boleh kosong";
} else {
    // Mendapatkan data tanggal saat ini
    $currentDate = date("Y-m-d");

    // Periksa apakah nama yang diubah sudah ada di database
    $queryCheckExisting = "SELECT COUNT(*) AS count FROM brand WHERE NamaBrand = '$updatedNamaBrand' AND SKU_BRND != '$skuToEdit'";
    $resultCheckExisting = mysqli_query($koneksi, $queryCheckExisting);
    $rowCheckExisting = mysqli_fetch_assoc($resultCheckExisting);
    $count = $rowCheckExisting['count'];

    if ($count > 0) {
        echo "Brand sudah ada di database";
    } else {
        // Update data nama dan tanggal jika tidak ada yang sama
        mysqli_query($koneksi, "UPDATE brand SET NamaBrand='$updatedNamaBrand', Tanggal='$currentDate' WHERE SKU_BRND='$skuToEdit'");
    }
}
?>
