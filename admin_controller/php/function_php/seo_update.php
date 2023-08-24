<?php 
include '../../../koneksi.php';

$KodeSEO = $_POST['KodeSEO'];

$PageTitle = $_POST['PageTitle'];
$MetaDiscription = $_POST['Description'];
$FokusKeyword = $_POST['FokusKeyword'];
date_default_timezone_set("Asia/Makassar");
$WaktuUpdate = date('Y-m-d H:i:s'); // Get current date and time


$joinedKeywords = implode(', ', array_map('trim', explode(',', $FokusKeyword)));

try{
    $sql = "UPDATE seo SET PageTitle='$PageTitle',Description='$MetaDiscription',FokusKeyword='$joinedKeywords', 
                WaktuUpdate='$WaktuUpdate' WHERE KodeSEO='$KodeSEO'";
    
    $stmt = $koneksi->prepare($sql);

    $stmt->execute();

    header("location:../../seo.php");
}
catch(PDOException $e){
    echo "Error Saat Update Data : ".$e->getMessage();
}

?>