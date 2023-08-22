<?php 

$koneksi = mysqli_connect("localhost","root","","siagamedika");

if(!$koneksi){
    die("Koneksi database gagal : ".mysqli_connect_error());
}
?>