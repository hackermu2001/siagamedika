<?php
include '../../../koneksi.php';

$NamaProduk = mysqli_real_escape_string($koneksi, $_POST['NamaProduk']);
$Kategori = mysqli_real_escape_string($koneksi, $_POST['Kategori']);
$Brand = mysqli_real_escape_string($koneksi, $_POST['Brand']);
$Harga = floatval($_POST['numHarga']); // Pastikan Harga adalah angka positif
$Keterangan = nl2br($_POST['Deskripsi']); // Mengubah baris baru menjadi tag <br>
$Keterangan = str_replace("\r\n", "", $Keterangan);   // Mengganti \r\n dengan tag <br>
$LinkGambar = mysqli_real_escape_string($koneksi, $_POST['LinkGambar']);

// Validasi panjang karakter nama produk
if (strlen($NamaProduk) < 20) {
    header("location:../../product_add.php?error=Nama produk harus minimal 20 huruf");
    exit;
}

// Insert data ke tabel produk dengan prepared statement
$stmt = $koneksi->prepare("INSERT INTO produk (KodeProduk, NamaProduk, kode_kategori, SKU_BRND, Harga) VALUES (NULL, ?, ?, ?, ?)");
$stmt->bind_param("sssd", $NamaProduk, $Kategori, $Brand, $Harga);
$stmt->execute();

$KodeProduk = mysqli_insert_id($koneksi);

// Update data tambahan (jika ada)
$additionalFields = array(
    'Gambar' => $LinkGambar,
    'Keterangan' => $Keterangan,
    'Tokopedia' => $_POST['Tokopedia'],
    'Blibli' => $_POST['Blibli'],
    'Shopee' => $_POST['Shopee']
);

foreach ($additionalFields as $field => $value) {
    $value = mysqli_real_escape_string($koneksi, $value); // Escape nilai
    if (!empty($value)) {
        $stmt = $koneksi->prepare("UPDATE produk SET $field=? WHERE KodeProduk=?");
        $stmt->bind_param("si", $value, $KodeProduk);
        $stmt->execute();
    }
}

header("location:../../product_edit.php");
?>
