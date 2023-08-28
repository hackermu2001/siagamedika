<?php
session_start();

$current_page = 'banner';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('layout/head.php') ?>
    <meta name="description" content="">
    <meta name="author" content=""> 
    <title>Siagamedika - Banner</title>
    <?php include('layout/css.php')?>
    <?php include('../koneksi.php')?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('layout/side_nav.php') ?> 
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php include ('layout/nav.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Banner</h1>
                        <a href="banner.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> View Banner</a>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Banner Form</h6>
                        </div>
                        <div class="card-body">
                            <form action="php/function_php/banner_insert.php" novalidate class="needs-validation" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="">Judul</label>
                                    <input type="text" class="form-control" name="Judul" placeholder="Isi Judul..." required>
                                    <div class="invalid-feedback">Judul tidak boleh kosong</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="">Gambar</label>
                                    <input type="Gambar" class="form-control" name="GambarURL" placeholder="Isi Link Imgur..." required pattern="https://i\.imgur\.com/.*">
                                    <div class="invalid-feedback">
                                        Link Gambar harus diisi dan dimulai dengan https://i.imgur.com/.
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tautan</label>
                                    <input type="text" class="form-control" name="TautanURL" placeholder="Isi Tautan..." required>
                                    <div class="invalid-feedback">Tautan tidak boleh kosong</div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="TglAkhir" title="Tanggal Akhir" required>
                                    <div class="invalid-feedback">Tanggal tidak boleh kosong</div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           <?php include('layout/footer.php')?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    
    <?php include('layout/script.php') ?>
    <script src="js/banner.min.js"></script>
</body>
</html>