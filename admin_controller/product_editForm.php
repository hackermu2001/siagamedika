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
        <?php include'../koneksi.php';?>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit {{ Nama Product }}</h1>
                        <a href="product_view.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> View List</a>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ id_product }} - {{ Nama Product }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="php/function_php/produk_update.php" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="NamaProduk">Nama Produk</label>
                                        <input type="text" class="form-control" name="NamaProduk">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="inputCategory">Category</label>
                                        <select name="Kategori" class="form-control">
                                            <option selected>Choose...</option>
                                            <?php
                                            $kategori = mysqli_query($koneksi,"SELECT kode_kategori,
                                                        NamaKategori FROM kategori");
                                            while($k = mysqli_fetch_array($kategori)){
                                            ?>
                                            <option value="<?php echo $k['kode_kategori']; ?>">
                                                <?php echo $k['NamaKategori']; ?>
                                            </option>
                                            <?php
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskirpsi</label>
                                    <textarea type="text" rows="5" class="form-control" name="Deskripsi" placeholder=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="LinkGambar">Link Gambar</label>
                                    <input type="text" class="form-control" name="LinkGambar" placeholder="Ex: https://i.imgur.com/xmO8Lsp.jpg">
                                    </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" name="numHarga" placeholder="Rp.">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="brand">Brand</label>
                                        <select name="Brand" class="form-control">
                                            <option selected>Choose...</option>
                                            <?php
                                            $Brand = mysqli_query($koneksi,"SELECT SKU_BRND,NamaBrand 
                                            FROM brand");
                                            while($b = mysqli_fetch_array($Brand)){ 
                                            ?>
                                            <option value="<?php echo $b['SKU_BRND']; ?>">
                                                <?php echo $b['NamaBrand']; ?>
                                            </option>
                                            <?php
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="Tokopedia">Tokopedia</label>
                                        <input type="text" class="form-control" name="Tokopedia" placeholder="Isi Produk Link...">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Shopee">Shopee</label>
                                        <input type="text" class="form-control" name="Shopee" placeholder="Isi Produk Link...">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Blibli">Blibli</label>
                                        <input type="text" class="form-control" name="Blibli" placeholder="Isi Produk Link...">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block my-2 btn-primary">Sign in</button>
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
</body>
</html>