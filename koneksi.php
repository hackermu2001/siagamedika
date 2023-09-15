<?php 
//Production Siagamedika
$koneksi = mysqli_connect("194.163.42.23","u1567541_agusvirga","vst64yst90","u1567541_siagamedika");

//UAT Siagamedika
// $koneksi = mysqli_connect("localhost","root","","siagamedika");

if(!$koneksi){
    die("Koneksi database gagal : ".mysqli_connect_error());
}
?> 