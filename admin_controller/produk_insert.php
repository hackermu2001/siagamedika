<?php
include '../koneksi.php';

$NamaProduk = $_POST['txtNamaProduk'];
$Harga = $_POST['numHarga'];
$Gambar = $_POST['txtLinkGambar'];
$Keterangan = $_POST['txtKeterangan'];

$rand = rand();
$allowed = array('gif','png','jpg','jpeg');

$filename = $_FILES['Foto']['name'];

mysqli_query($koneksi, "INSERT INTO produk (KodeProduk,NamaProduk,Harga,Gambar,Keterangan) VALUES (NULL,'$NamaProduk','$Harga','','')");

$LastKodeProduk = mysqli_query($koneksi, "SELECT KodeProduk FROM produk WHERE KodeProduk=(SELECT MAX(KodeProduk) FROM produk)");
$LKP = mysqli_fetch_assoc($LastKodeProduk);
$KodeProduk = $LI['KodeProduk'];

if($Keterangan!=null || $Keterangan!=""){
    mysqli_query($koneksi, "UPDATE produk SET Keterangan='$Keterangan' WHERE KodeProduk='$KodeProduk'");
}

if($filename!="" || $filename!=null){
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(in_array($ext, $allowed)){
        move_uploaded_file($_FILES['Foto']['tmp_name'], '../gambar/produk/'.$rand.'_'.$filename);
        $file_gambar = $rand.'_'.$filename;
        
        mysqli_query($koneksi, "UPDATE produk SET Gambar='$file_gambar' WHERE KodeProduk='$KodeProduk'");
    }
}

$filename1 = $_FILES['Foto1']['name'];
$filename2 = $_FILES['Foto2']['name'];
$filename3 = $_FILES['Foto3']['name'];
$filename4 = $_FILES['Foto4']['name'];
$filename5 = $_FILES['Foto5']['name'];
$filename6 = $_FILES['Foto6']['name'];
$filename7 = $_FILES['Foto7']['name'];
$filename8 = $_FILES['Foto8']['name'];
$filename9 = $_FILES['Foto9']['name'];
$filename10 = $_FILES['Foto10']['name'];

if($filename1!=null || $filename1!=""){
    move_uploaded_file($_FILES['Foto1']['tmp_name'], "../gambar/produk/".$rand."_".$filename1);
    $file_gambar1 = $rand.'_'.$filename1;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar1')");
}

if($filename2!=null || $filename2!=""){
    move_uploaded_file($_FILES['Foto2']['tmp_name'], "../gambar/produk/".$rand."_".$filename2);
    $file_gambar2 = $rand.'_'.$filename2;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar2')");
}

if($filename3!=null || $filename3!=""){
    move_uploaded_file($_FILES['Foto3']['tmp_name'], "../gambar/produk/".$rand."_".$filename3);
    $file_gambar3 = $rand.'_'.$filename3;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar3')");
}

if($filename4!=null || $filename4!=""){
    move_uploaded_file($_FILES['Foto4']['tmp_name'], "../gambar/produk/".$rand."_".$filename4);
    $file_gambar4 = $rand.'_'.$filename4;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar4')");
}

if($filename5!=null || $filename5!=""){
    move_uploaded_file($_FILES['Foto5']['tmp_name'], "../gambar/produk/".$rand."_".$filename5);
    $file_gambar5 = $rand.'_'.$filename5;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar5')");
}

if($filename6!=null || $filename6!=""){
    move_uploaded_file($_FILES['Foto6']['tmp_name'], "../gambar/produk/".$rand."_".$filename6);
    $file_gambar6 = $rand.'_'.$filename6;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar6')");
}

if($filename7!=null || $filename7!=""){
    move_uploaded_file($_FILES['Foto7']['tmp_name'], "../gambar/produk/".$rand."_".$filename7);
    $file_gambar7 = $rand.'_'.$filename7;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar7')");
}

if($filename8!=null || $filename8!=""){
    move_uploaded_file($_FILES['Foto8']['tmp_name'], "../gambar/produk/".$rand."_".$filename8);
    $file_gambar8 = $rand.'_'.$filename8;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar8')");
}

if($filename9!=null || $filename9!=""){
    move_uploaded_file($_FILES['Foto9']['tmp_name'], "../gambar/produk/".$rand."_".$filename9);
    $file_gambar9 = $rand.'_'.$filename9;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar9')");
}

if($filename10!=null || $filename10!=""){
    move_uploaded_file($_FILES['Foto10']['tmp_name'], "../gambar/produk/".$rand."_".$filename10);
    $file_gambar10 = $rand.'_'.$filename10;
    mysqli_query($koneksi, "INSERT INTO gambarproduk (KodeGambar,KodeProduk,Gambar) VALUES (NULL,'$KodeProduk','$file_gambar10')");
}

header("location:spesifikasi_tambah.php");