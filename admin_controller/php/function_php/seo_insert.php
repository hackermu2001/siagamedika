<?php
include '../../../koneksi.php';

$PageTitle = $_POST['PageTitle'];
$Description = $_POST['Description'];
$FokusKeyword = $_POST['FokusKeyword'];

// Process FokusKeyword into a single string
$joinedKeywords = implode(', ', array_map('trim', explode(',', $FokusKeyword)));

$pageSelected = $_POST['page_url'];

// Map the selected page value to its corresponding text
if ($pageSelected == '1') {
    $pageText = 'Halaman Home';
} elseif ($pageSelected == '2') {
    $pageText = 'Halaman Produk';
} else {
    // Mengekstrak SKU_BRND dari pilihan yang dipilih
    $SQLBrand = "SELECT SKU_BRND, NamaBrand FROM brand WHERE SKU_BRND = ?";
    $stmtBrand = $koneksi->prepare($SQLBrand);
    $stmtBrand->bind_param("s", $pageSelected);
    $stmtBrand->execute();
    $stmtBrand->bind_result($SKU_BRND, $NamaBrand);
    $stmtBrand->store_result();

    // Memeriksa apakah SKU_BRND ditemukan dalam database
    if ($stmtBrand->num_rows > 0) {
        $stmtBrand->fetch();
        $pageText = "Halaman Brand : $SKU_BRND - $NamaBrand";
    } else {
        // Mengekstrak kode_kategori dari pilihan yang dipilih
        $SQLCategory = "SELECT kode_kategori, NamaKategori FROM kategori WHERE kode_kategori = ?";
        $stmtCategory = $koneksi->prepare($SQLCategory);
        $stmtCategory->bind_param("s", $pageSelected);
        $stmtCategory->execute();
        $stmtCategory->bind_result($selectedKodeKategori, $NamaKategori);
        $stmtCategory->store_result();

        // Memeriksa apakah kode_kategori ditemukan dalam database
        if ($stmtCategory->num_rows > 0) {
            $stmtCategory->fetch();
            $pageText = "Halaman Kategori : $selectedKodeKategori - $NamaKategori";
        } else {
            $pageText = 'Undefined Page';
        }
    }
}

try {
    date_default_timezone_set("Asia/Makassar");
    $now = date('Y-m-d H:i:s'); // Get current date and time

    $sql = "INSERT INTO seo (kodeSEO, page_url, PageTitle, Description, FokusKeyword, WaktuBuat, WaktuUpdate) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssssss", $kodeSEO, $pageText, $PageTitle, $Description, $joinedKeywords, $now, $now);

    $stmt->execute();

    header("location:../../seo.php");
} catch(Exception $e) {
    echo "Error Saat Menyimpan Data : " . $e->getMessage();
}
?>
