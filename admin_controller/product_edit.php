<?php
// product_edit.php

session_start();

$current_page = 'product_edit';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

include '../koneksi.php';

$searchQuery = isset($_GET['search_query']) ? $_GET['search_query'] : '';

$query = "SELECT p.KodeProduk AS KodeProduk, p.NamaProduk AS NamaProduk, k.NamaKategori AS Kategori, b.NamaBrand AS Brand, p.Harga AS Harga,
        p.Gambar AS Gambar, p.Keterangan AS Keterangan, p.TokoPedia AS Tokopedia, p.Blibli AS Blibli, p.Shopee AS Shopee 
        FROM produk p INNER JOIN kategori k INNER JOIN brand b 
        ON (p.kode_kategori=k.kode_kategori AND p.SKU_BRND=b.SKU_BRND) 
        WHERE p.NamaProduk LIKE '%$searchQuery%'";

$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('layout/head.php') ?>
    <meta name="description" content="">
    <meta name="author" content=""> 
    <title>Siagamedika - Product Edit</title>
    <?php 
    include('layout/css.php');

    ?>
</head>

<body id="page-top">
    <?php
    include '../koneksi.php'; 
    ?>
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
                    <?php
                    if (!empty($searchQuery)) {
                        echo '<h1 class="h3 mb-0 text-gray-800">Search Result "' . $searchQuery . '"</h1>';
                    } else {
                        echo '<h1 class="h3 mb-0 text-gray-800">Edit Barang</h1>';
                    }
                    ?>
                        <a href="product_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Product</a>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Edit Barang</h6>
                            <a href="product_edit.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-sync fa-sm text-white-50"></i> Refresh</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th class="w-auto">Nama Barang</th>
                                            <th>Harga</th>
                                            <th width="10">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $No = 1;
                                    while ($p = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $No++; ?></td>
                                            <td class="align-middle">
                                                <div class="media">
                                                    <img src="<?php echo $p['Gambar']?>" width="50" height="50" class="mr-3" alt="https://i.imgur.com/xmO8Lsp.jpg"> 
                                                    <div class="media-body">
                                                        <h6 class="mb-0">
                                                            <?php
                                                            echo $p['NamaProduk']; 
                                                            ?>
                                                        </h6>
                                                        <small class="category">
                                                            <span class="badge badge-pill badge-primary">
                                                                <?php echo $p['Brand']; ?>
                                                            </span>
                                                            <span class="badge badge-success badge-pill mr-1">
                                                                <?php echo $p['Kategori']; ?>
                                                            </span>
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center"><?php echo "Rp. ".number_format($p['Harga']); ?></td>
                                            <td class="align-middle text-center">
                                                <a href="get_product_form.php?id=<?php echo $p['KodeProduk']; ?>" class="btn btn-primary btn-circle btn-sm edit-btn">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button class="btn btn-danger btn-circle btn-sm delete-btn" data-toggle="modal" data-target="#Hapus<?php echo $p['KodeProduk']; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- hapus Modal -->
                                                <div class="modal fade" id="Hapus<?php echo $p['KodeProduk']; ?>" tabindex="-1" aria-labelledby="HapusLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="HapusLabel">Delete Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left">
                                                                Are you sure to delete <b><?php echo $p['NamaProduk']; ?></b>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="php/function_php/produk_delete.php?id=<?php echo $p['KodeProduk']; ?>" class="btn btn-danger delete-btn"><i class="fas fa-trash mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
            <!-- Edit Modal -->
                    

            <!-- Footer -->
           <?php include('layout/footer.php')?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    
    <?php include('layout/script.php') ?>
    <script src="js/product.min.js"></script>
</body>
</html>