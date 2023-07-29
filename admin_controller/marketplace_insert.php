<?php 

include '../koneksi.php';

$NamaMarket = $_POST['NamaMarket'];

$rand = rand();
$allowed = array('gif','png','jpg','jpeg');

$filename = $_FILES['Foto']['name'];

mysqli_query($koneksi, "INSERT INTO marketplace (KodeMarket,NamaMarket,Logo) VALUES (NULL,''");