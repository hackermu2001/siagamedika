<?php 
//Production Siagamedika
$koneksi = mysqli_connect("83.136.216.72","u1567541_agusvirga","V2e2Sy7E3s","u1567541_siagamedika");

//UAT Siagamedika
// $koneksi = mysqli_connect("localhost","root","","siagamedika");

if(!$koneksi){
    die("Koneksi database gagal : ".mysqli_connect_error());
}
?>