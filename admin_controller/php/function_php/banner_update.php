<?php
include './koneksi.php';

$KodeBanner = $_GET['id'];

$Judul = $_POST['Judul'];
$GambarURL = $_POST['GambarURL'];
$TautanURL = $_POST['TautanURL'];
$TglMulai = $_POST['TglMulai'];
$TglAkhir = $_POST['TglAkhir'];
$WaktuBuat = $_POST['WaktuBuat'];
$WaktuUpdate = $_POST['WaktuUpdate'];

try{
    $sql = "UPDATE banner SET Judul='$Judul',GambarURL='$GambarURL',TautanURL='$TautanURL',TglMulai='$TglMulai',TglAkhir='$TglAkhir',
            WaktuBuat='$WaktuBuat',WaktuUpdate='$WaktuUpdate' WHERE KodeBanner='$KodeBanner'";

    $stmt = $koneksi -> prepare($sql);

    $stmt -> execute();

    header("location:banner.php");
}
catch(PDOException $e){
    echo "Error Saat Memperbarui Data Banner : ".$e->getMessage();
}
?>