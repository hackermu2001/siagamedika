<?php 

include "../koneksi.php";

$LastKodeProduk = mysqli_query($koneksi,"SELECT KodeProduk FROM produk WHERE 
                    KodeProduk = (SELECT MAX(KoeProduk) FROM produk)");
$LKP = mysqli_fetch_assoc($LastKodeProduk);
$KodeProduk = $LKP['KodeProduk'];


for ($i = 1; $i <= 15; $i++) {
    $specs[] = array("NamaSpec" => $_POST["NamaSpec{$i}"], "Keterangan" => $_POST["Keterangan{$i}"]);
}

foreach ($specs as $spec) {
    $NamaSpec = $spec['NamaSpec'];
    $Keterangan = $spec['Keterangan'];
    
    if ($NamaSpec != null || $NamaSpec != "") {
        mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk, NamaSpesifikasi, Keterangan) 
                        VALUES ('$KodeProduk', '$NamaSpec', '')");
    }
    if ($Keterangan != null || $Keterangan != "") {
        $LastKodeSpec = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
                        KodeSpesifikasi = (SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
        $LKS = mysqli_fetch_assoc($LastKodeSpec);
        mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan = '$Keterangan' WHERE KodeSpec = '{$LKS['KodeSpesifikasi']}'");
    }
}

header("Location: produk.php");

// include "../koneksi.php";

// $LastKodeProduk = mysqli_query($koneksi,"SELECT KodeProduk FROM produk WHERE 
//                     KodeProduk = (SELECT MAX(KoeProduk) FROM produk)");
// $LKP = mysqli_fetch_assoc($LastKodeProduk);
// $KodeProduk = $LKP['KodeProduk'];

// $NamaSpec1 = $_POST['NamaSpec1'];
// $Keterangan1 = $_POST['Keterangan1'];
// if($NamaSpec1!=null || $NamaSpec1!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec1','')");
// }
// if($Keterangan1!=null || $Keterangan1!=""){
//     $LastKodeSpec1 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS1 = mysqli_fetch_assoc($LastKodeSpec1);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan1' WHERE KodeSpec='$LKS1'");
// }

// $NamaSpec2 = $_POST['NamaSpec2'];
// $Keterangan2 = $_POST['Keterangan2'];
// if($NamaSpec2!=null || $NamaSpec2!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec2','')");
// }
// if($Keterangan2!=null || $Keterangan2!=""){
//     $LastKodeSpec2 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS2 = mysqli_fetch_assoc($LastKodeSpec1);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan1' WHERE KodeSpec='$LKS2'");
// }

// $NamaSpec3 = $_POST['NamaSpec3'];
// $Keterangan3 = $_POST['Keterangan3'];
// if($NamaSpec3!=null || $NamaSpec3!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec3','')");
// }
// if($Keterangan3!=null || $Keterangan3!=""){
//     $LastKodeSpec3 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS3 = mysqli_fetch_assoc($LastKodeSpec3);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan3' WHERE KodeSpec='$LKS3'");
// }

// $NamaSpec4 = $_POST['NamaSpec4'];
// $Keterangan4 = $_POST['Keterangan4'];
// if($NamaSpec4!=null || $NamaSpec4!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec4','')");
// }
// if($Keterangan4!=null || $Keterangan4!=""){
//     $LastKodeSpec4 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS4 = mysqli_fetch_assoc($LastKodeSpec4);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan4' WHERE KodeSpec='$LKS4'");
// }

// $NamaSpec5 = $_POST['NamaSpec5'];
// $Keterangan5 = $_POST['Keterangan5'];
// if($NamaSpec5!=null || $NamaSpec5!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec5','')");
// }
// if($Keterangan5!=null || $Keterangan5!=""){
//     $LastKodeSpec5 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS5 = mysqli_fetch_assoc($LastKodeSpec5);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan5' WHERE KodeSpec='$LKS5'");
// }

// $NamaSpec6 = $_POST['NamaSpec6'];
// $Keterangan6 = $_POST['Keterangan6'];
// if($NamaSpec6!=null || $NamaSpec6!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec6','')");
// }
// if($Keterangan6!=null || $Keterangan6!=""){
//     $LastKodeSpec6 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS6 = mysqli_fetch_assoc($LastKodeSpec6);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan6' WHERE KodeSpec='$LKS6'");
// }

// $NamaSpec7 = $_POST['NamaSpec7'];
// $Keterangan7 = $_POST['Keterangan7'];
// if($NamaSpec7!=null || $NamaSpec7!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec7','')");
// }
// if($Keterangan7!=null || $Keterangan7!=""){
//     $LastKodeSpec3 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS7 = mysqli_fetch_assoc($LastKodeSpec7);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan7' WHERE KodeSpec='$$LKS7'");
// }

// $NamaSpec8 = $_POST['NamaSpec8'];
// $Keterangan8 = $_POST['Keterangan8'];
// if($NamaSpec8!=null || $NamaSpec8!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec8','')");
// }
// if($Keterangan8!=null || $Keterangan8!=""){
//     $LastKodeSpec8 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LastKodeSpec8 = mysqli_fetch_assoc($LastKodeSpec8);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan8' WHERE KodeSpec='$LKS8'");
// }

// $NamaSpec9 = $_POST['NamaSpec9'];
// $Keterangan9 = $_POST['Keterangan9'];
// if($NamaSpec9!=null || $NamaSpec9!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec9','')");
// }
// if($Keterangan9!=null || $Keterangan9!=""){
//     $LastKodeSpec9 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS9 = mysqli_fetch_assoc($LastKodeSpec9);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan9' WHERE KodeSpec='$LKS9'");
// }

// $NamaSpec10 = $_POST['NamaSpec10'];
// $Keterangan10 = $_POST['Keterangan10'];
// if($NamaSpec10!=null || $NamaSpec10!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec10','')");
// }
// if($Keterangan10!=null || $Keterangan10!=""){
//     $LastKodeSpec10 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS10 = mysqli_fetch_assoc($LastKodeSpec10);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan10' WHERE KodeSpec='$LKS10'");
// }

// $NamaSpec11 = $_POST['NamaSpec11'];
// $Keterangan11 = $_POST['Keterangan11'];
// if($NamaSpec11!=null || $NamaSpec11!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec11','')");
// }
// if($Keterangan11!=null || $Keterangan11!=""){
//     $LastKodeSpec11 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS11 = mysqli_fetch_assoc($LastKodeSpec11);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan11' WHERE KodeSpec='$LKS11'");
// }

// $NamaSpec12 = $_POST['NamaSpec12'];
// $Keterangan12 = $_POST['Keterangan12'];
// if($NamaSpec12!=null || $NamaSpec12!=""){
//     mysqli_query($koneksi, "INSERT INTO spesifikasi (KodeProduk,NamaSpesifikasi,Keterangan) 
//                     VALUES('$KodeProduk','$NamaSpec3','')");
// }
// if($Keterangan12!=null || $Keterangan12!=""){
//     $LastKodeSpec12 = mysqli_query($koneksi, "SELECT KodeSpesifikasi FROM spesifikasi WHERE 
//                     KodeSpesifikasi=(SELECT MAX(KodeSpesifikasi) FROM spesifikasi)");
//     $LKS12 = mysqli_fetch_assoc($LastKodeSpec12);
//     mysqli_query($koneksi, "UPDATE spesifikasi SET Keterangan='$Keterangan12' WHERE KodeSpec='$LKS12'");
// }

// header ("location : produk.php");