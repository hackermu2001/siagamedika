<?php 
include '../../../koneksi.php';

$PageTitle = $_POST['PageTitle'];
$MetaDiscription = $_POST['MetaDesc'];
$FokusKeyword = $_POST['FokusKeyword'];
$Content = $_POST['Content'];
$WaktuBuat = $_POST['WaktuBuat'];
$WaktuUpdte = $_POST['WaktuUpdate'];

try{
    $sql = "INSERT INTO seo (KodeSEO,PageTitle,MetaDescription,FokusKeyword,Content,WaktuBuat,WaktuUpdate) 
            VALUES('','$PageTitle','$MetaDiscription','$FokusKeyword','$Content','$WaktuBuat','$WaktuUpdte')";

    $stmt = $koneksi->prepare($sql);

    $stmt->execute();

    header("location:seo.php");
}
catch(PDOException $e){
    echo "Error Saat Menyimpan Data : ".$e->getMessage();
}

?>

