<?php
include '../../../koneksi.php';

$NamaBrand = $_POST['txtNamaBrand'];
$number = count($NamaBrand);

if ($number > 0)  
{  
    $errorMessages = []; // Membuat array untuk menyimpan pesan kesalahan
    $existingNames = []; // Array untuk melacak nama-nama brand yang sudah ada di database

    // Mengambil semua nama brand yang sudah ada di database
    $existingNamesQuery = mysqli_query($koneksi, "SELECT NamaBrand FROM brand");
    while ($row = mysqli_fetch_assoc($existingNamesQuery)) {
        $existingNames[] = strtolower($row['NamaBrand']);
    }

    for ($i = 0; $i < $number; $i++)  
    {  
        if (trim($NamaBrand[$i]) != '')  
        {
            $nama = mysqli_real_escape_string($koneksi, $NamaBrand[$i]);

            if (in_array(strtolower($nama), $existingNames)) {
                $errorMessages[] = "Nama brand '$nama' sudah ada dalam database.";
            } else {
                // Jika nama belum ada dalam database, lanjutkan proses insert
                $Tanggal = date("Y-m-d"); // Tanggal hari ini
                $SKU_BRND = "BRND" . rand(100, 999); // Contoh BRND100-999

                mysqli_query($koneksi, "INSERT INTO brand (NamaBrand, Tanggal, SKU_BRND) VALUES ('$nama', '$Tanggal', '$SKU_BRND')");
            }
        }  
    }  

    if (!empty($errorMessages)) {
        // Jika ada pesan kesalahan, kirimkan pesan ke halaman sebelumnya
        $errorMessage = implode("<br>", $errorMessages);
        header("location:../../brand.php?error=$errorMessage");
    } else {
        header("location:../../brand.php");
    }
}  
else 
{  
    // Tambahkan pesan error jika perlu
    header("location:../../brand.php?error=Please enter at least one brand name");
}
?>
