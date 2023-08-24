<?php
session_start();

$current_page = 'seo';

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
    <title>Siagamedika - SEO</title>
    <?php include('layout/css.php')?>
    <?php include '../koneksi.php';?>
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
                        <h1 class="h3 mb-0 text-gray-800">Edit SEO-ID</h1>
                        <a href="seo.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> View SEO</a>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Edit SEO</h6>
                        </div>
                        <div class="card-body">
                            <form action="php/function_php/seo_update.php" class="needs-validation" novalidate method="post">
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label for="PageTitle">Title</label>
                                            <input type="text" class="form-control" name="PageTitle" placeholder="Isi Judul..." id="PageTitle" required>
                                            <div class="invalid-feedback">
                                                Judul tidak boleh kosong !
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="page_url">Link Halaman</label>
                                            <select type="text" class="form-control" name="page_url" required disabled>
                                                <option>H</option>
                                            </select>

                                            <div class="invalid-feedback">
                                                Link halaman tidak boleh kosong !
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="Description">Description</label>
                                            <textarea type="text" class="form-control" placeholder="Isi Deskripsi.." rows="7" name="Description" id="Description" required></textarea>
                                            <div class="invalid-feedback">
                                                Deskripsi tidak boleh kosong !
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group tags-input">
                                                <label for="Tags">Keyword</label>
                                                <input type="text" class="form-control" id="tagInput" placeholder="Tambah Keyword...">
                                                <div class="input-tags-list d-inline-block flex-wrap" id="inputTagsList" style="gap: 5px; margin-top: 5px;"></div>
                                                <input type="hidden" id="hiddenFokusKeyword" name="FokusKeyword" value="">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
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
    <script src="js/seo.js"></script>
</body>
</html>