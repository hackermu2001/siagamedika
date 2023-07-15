<?php 
include "./koneksi.php";

$NamaBrand = $_POST['NamaBrand'];

mysqli_query($koneksi, "INSERT INTO brand (KodeBrand,NamaBrand) VALUES('','$NamaBrand'");

header("location:brand.php");
