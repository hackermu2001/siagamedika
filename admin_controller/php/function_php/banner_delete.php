<?php
include './koneksi.php';

$KodeBanner = $_GET['id'];

try{
    $sql = "DELETE FROM banner WHERE KodeBanner='$KodeBanner'";

    $stmt = $koneksi->prepare($sql);

    $stmt->execute();

    header("location:banner.php");
}
catch(PDOException $e){
    echo "Errro saat mengahapus Data Banner : ".$e->getMessage();
}

?>