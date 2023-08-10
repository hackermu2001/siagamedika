<?php
session_start();

$current_page = 'product_edit';

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
                    <h1 class="h3 mb-2 text-gray-800">Edit Barang</h1>
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
                                            <th width="10">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $produk = mysqli_query($koneksi,"SELECT p.KodeProduk AS KodeProduk,p.NamaProduk AS NamaProduk,k.NamaKategori AS Kategori,b.NamaBrand AS Brand,p.Harga AS Harga,
                                        p.Gambar AS Gambar,p.Keterangan AS Keterangan,p.TokoPedia AS Tokopedia,p.Blibli AS Blibli,p.Shopee AS Shopee FROM produk p 
                                        INNER JOIN kategori k INNER JOIN brand b ON (p.kode_kategori=k.kode_kategori AND p.SKU_BRND=b.SKU_BRND) WHERE (1=1)");
                                        $No=1;
                                        while($p = mysqli_fetch_array($produk)){
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
                                                <button class="btn btn-danger btn-circle btn-sm delete-btn" data-toggle="modal" data-target="#Hapus"  data-id="<?php echo $p['KodeProduk']; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <!-- hapus Modal -->
                                                <div class="modal fade" id="Hapus" tabindex="-1" aria-labelledby="HapusLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="HapusLabel">Delete Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        Are you sure to delete this <b></b> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button id="deleteButton" type="button" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Delete</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </td>
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
            <!-- Edit Modal -->
                    

            <!-- Footer -->
           <?php include('layout/footer.php')?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    
    <?php include('layout/script.php') ?>
    <script src="js/product_ajax.js"></script>
</body>
</html>