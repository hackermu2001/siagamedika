<?php 
include './koneksi.php';

$KodeSEO = $_GET['id'];

$PageTitle = $_POST['PageTitle'];
$MetaDiscription = $_POST['MetaDesc'];
$FokusKeyword = $_POST['FokusKeyword'];
$Content = $_POST['Content'];
$WaktuBuat = $_POST['WaktuBuat'];
$WaktuUpdte = $_POST['WaktuUpdate'];

try{
    $sql = "UPDATE seo SET PageTitle='$PageTitle',MetaDescription='$MetaDiscription',FokusKeyword='$FokusKeyword',Content='$Content',WaktuBuat='$WaktuBuat', 
                WaktuUpdate='$WaktuUpdte' WHERE KodeSEO='$KodeSEO'";
    
    $stmt = $koneksi->prepare($sql);

    $stmt->execute();

    header("location:seo.php");
}
catch(PDOException $e){
    echo "Error Saat Update Data : ".$e->getMessage();
}

?>