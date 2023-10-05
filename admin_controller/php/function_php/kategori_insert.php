<?php
include '../../../koneksi.php';

$NamaKategori = $_POST['txtNamaCat'];
$number = count($NamaKategori);

if ($number > 0)  
{  
    $errorMessages = []; // Membuat array untuk menyimpan pesan kesalahan
    $existingNames = []; // Array untuk melacak nama-nama brand yang sudah ada di database

    // Mengambil semua nama brand yang sudah ada di database
    $existingNamesQuery = mysqli_query($koneksi, "SELECT NamaKategori FROM kategori");
    while ($row = mysqli_fetch_assoc($existingNamesQuery)) {
        $existingNames[] = strtolower($row['NamaKategori']);
    }

    for ($i = 0; $i < $number; $i++)  
    {  
        if (trim($NamaKategori[$i]) != '')  
        {
            $nama = mysqli_real_escape_string($koneksi, $NamaKategori[$i]);

            if (in_array(strtolower($nama), $existingNames)) {
                $errorMessages[] = "Nama Kategori '$nama' sudah ada dalam database.";
            } else {
                // Jika nama belum ada dalam database, lanjutkan proses insert
                $Tanggal = date("Y-m-d"); // Tanggal hari ini
                $baseCAT = "CAT" . rand(100, 999); // CAT dasar
                $counter = 1; // Inisialisasi hitungan

                // Membuat CAT baru dengan nomor urutan jika CAT sebelumnya sudah ada
                $kode_kategori = $baseCAT;
                while (in_array(strtolower($kode_kategori), $existingNames)) {
                    $counter++;
                    $kode_kategori = $baseCAT . " (" . $counter . ")";
                }

                mysqli_query($koneksi, "INSERT INTO kategori (NamaKategori, Tanggal, kode_kategori) VALUES ('$nama', '$Tanggal', '$kode_kategori')");
            }
        }  
    }  

    if (!empty($errorMessages)) {
        // Jika ada pesan kesalahan, kirimkan pesan ke halaman sebelumnya
        $errorMessage = implode("<br>", $errorMessages);
        header("location:../../kategori.php?error=$errorMessage");
    } else {
        header("location:../../kategori.php");
    }
}  
else 
{  
    // Tambahkan pesan error jika perlu
    header("location:../../kategori.php?error=Please enter at least one Category name");
}
?>
