<?php

include './koneksi.php';

$KodeSeo = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM seo WHERE KodeSeo='$KodeSeo'");

?>