<?php
include '../../../koneksi.php';

$Judul = $_POST['Judul'];
$GambarURL = $_POST['GambarURL'];
$TautanURL = $_POST['TautanURL'];
$TglMulai = date('Y-m-d');
$TglAkhir = $_POST['TglAkhir'];
//$WaktuBuat = $_POST['WaktuBuat'];
//$WaktuUpdate = $_POST['WaktuUpdate'];

try{
    $sql = "INSERT INTO banner (KodeBanner,Judul,GambarURL,TautanURL,TglMulai,TglAkhir) VALUES('','$Judul','$GambarURL','$TautanURL',
                            '$TglMulai','$TglAkhir')";
    
    $stmt = $koneksi->prepare($sql);

    $stmt -> execute();

    header("location:../../banner.php");
}
catch(PDOException $e){
    echo "Error Saat Menyimpan Data Banner : ".$e->getMessage();
}
?>