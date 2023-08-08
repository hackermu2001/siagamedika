<?php
session_start();

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
    <title>SB Admin 2 - Dashboard</title>
    <?php include('layout/css.php')?>
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
                    <h1 class="h3 mb-2 text-gray-800">Daftar Barang</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th class="w-auto">Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Keterangan</th>
                                            <th width="10">Marketplace</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center">1</td>
                                            <td class="align-middle">
                                                <div class="media">
                                                    <img src="https://i.imgur.com/yQBJ68J.png" width="50" height="50" class="mr-3" alt="https://i.imgur.com/xmO8Lsp.jpg"> 
                                                    <div class="media-body">
                                                        <h6 class="mb-0">Gluco Dr</h6>
                                                        <small class="category">
                                                            <span class="badge badge-pill badge-primary">Gluco</span>
                                                            <span class="badge badge-success badge-pill mr-1">Laboratory</span>
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">Rp. 120.000</td>
                                            <td class="text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus harum, minus nihil expedita, et deserunt vel animi, ipsa adipisci labore eius iste sed distinctio temporibus. Hic a consequuntur quisquam placeat.</td>
                                            <td class="align-middle text-center">
                                                <button class="btn btn-primary btn-circle"><i class="ft-tokopedia"></i></button>
                                                <button class="btn btn-primary btn-circle"><i class="ft-shopee"></i></button>
                                                <button class="btn btn-primary btn-circle"><i class="ft-blibli"></i></button>
                                            </td>
                                        </tr>
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