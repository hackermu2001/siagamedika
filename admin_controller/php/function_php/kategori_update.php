<?php
include '../../../koneksi.php';

$id_catToEdit = $_POST['id_catToEdit'];
$updatedNamaKategori = mysqli_real_escape_string($koneksi, $_POST['updatedNamaKategori']);

if (empty($updatedNamaKategori)) {
    echo "Nama Kategori tidak boleh kosong";
} else {
    // Mendapatkan data tanggal saat ini
    $currentDate = date("Y-m-d");

    // Periksa apakah nama yang diubah sudah ada di database
    $queryCheckExisting = "SELECT COUNT(*) AS count FROM kategori WHERE NamaKategori = '$updatedNamaKategori' AND kode_kategori != '$id_catToEdit'";
    $resultCheckExisting = mysqli_query($koneksi, $queryCheckExisting);
    $rowCheckExisting = mysqli_fetch_assoc($resultCheckExisting);
    $count = $rowCheckExisting['count'];

    if ($count > 0) {
        echo "Kategori sudah ada di database";
    } else {
        // Update data nama dan tanggal jika tidak ada yang sama
        mysqli_query($koneksi, "UPDATE kategori SET NamaKategori='$updatedNamaKategori', Tanggal='$currentDate' WHERE kode_kategori='$id_catToEdit'");
    }
}
?>
