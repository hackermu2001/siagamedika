<?php
include './koneksi.php';

$Judul = $_POST['Judul'];
$GambarURL = $_POST['GambarURL'];
$TautanURL = $_POST['TautanURL'];
$TglMulai = $_POST['TglMulai'];
$TglAkhir = $_POST['TglAkhir'];
$WaktuBuat = $_POST['WaktuBuat'];
$WaktuUpdate = $_POST['WaktuUpdate'];

try{
    $sql = "INSERT INTO seo (KodeBanner,GambarURL,TautanURL,TglMulai,TglAkhir,WaktuBuat,WaktuUpdate) VALUES('','$GambarURL','$TautanURL',
                            '$TglMulai','$TglAkhir','$WaktuBuat','$WaktuUpdate')";
    
    $stmt = $koneksi->prepare($sql);

    $stmt -> execute();

    header("location:banner.php");
}
catch(PDOException $e){
    echo "Error Saat Menyimpan Data Banner : ".$e->getMessage();
}
?>