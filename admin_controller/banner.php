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
                        <h1 class="h3 mb-0 text-gray-800">Banner</h1>
                        <a href="banner_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Banner</a>
                    </div>
                    <div class="card">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Banner Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Link Imgur</th>
                                        <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SQL = "SELECT KodeBanner,Judul,GambarURL,TautanURL,TglMulai,TglAkhir FROM banner";
                                        $Banner = mysqli_query($koneksi,$SQL);
                                        $No = 1;
                                        foreach($Banner AS $b){
                                        ?>
                                        <tr>
                                            <td><?php echo $No++  ?></td>
                                            <td><?php echo $b['Judul']; ?></td>
                                            <td><?php echo $b['GambarURL']; ?></td>
                                            <td><?php echo $b['TglAkhir']; ?></td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
</body>
</html>