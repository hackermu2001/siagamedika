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
    $pageText = 'Undefined Page'; // Set a default value if needed
}

try {
    $now = date('Y-m-d H:i:s'); // Get current date and time

    $sql = "INSERT INTO seo (kodeSEO, page_url, PageTitle, Description, WaktuBuat, WaktuUpdate, FokusKeyword) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Assuming you have a default value for kodeSEO
    // $kodeSEO = "your_default_value";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssssss", $kodeSEO, $pageText, $PageTitle, $Description, $now, $now, $joinedKeywords);

    $stmt->execute();

    header("location:../../seo.php");
} catch(Exception $e) {
    echo "Error Saat Menyimpan Data : " . $e->getMessage();
}
?>
