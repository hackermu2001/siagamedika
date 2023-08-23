<?php
include '../../../koneksi.php';

$kodeSEO = $_POST['kodeSEO'];
$pageURL = $_POST['pageURL'];
$PageTitle = $_POST['PageTitle'];
$Description = $_POST['Description'];
$FokusKeyword = $_POST['FokusKeyword'];
$WaktuBuat = $_POST['WaktuBuat'];
$WaktuUpdate = $_POST['WaktuUpdate'];

try {
    $sql = "INSERT INTO seo (kodeSEO, page_url, PageTitle, Description, FokusKeyword, WaktuBuat, WaktuUpdate) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssssss", $kodeSEO, $pageURL, $PageTitle, $Description, $FokusKeyword, $WaktuBuat, $WaktuUpdate);

    $stmt->execute();

    header("location:seo.php");
} catch(Exception $e) {
    echo "Error Saat Menyimpan Data : " . $e->getMessage();
}
?>
