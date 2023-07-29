<?php

include '../koneksi.php';

$KodeBrand = $_POST['id'];
$NamaBrand = $_POST['NamaBrand'];

mysqli_query($koneksi, "UPDATE brand SET NamaBrand='$NamaBrand' WHERE KodeBranc='$KodeBrand'");

header("location:brand.php");
