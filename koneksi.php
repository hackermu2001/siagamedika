<?php 
//Production Siagamedika
$koneksi = mysqli_connect("194.163.42.23","u9973847_tokoadm","@Siaga123","u9973847_ecommerce");

//UAT Siagamedika
// $koneksi = mysqli_connect("localhost","root","","siagamedika");

if(!$koneksi){
    die("Koneksi database gagal : ".mysqli_connect_error());
}
?> 