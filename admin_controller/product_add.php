<?php
session_start();

$current_page = 'product_add';

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
    <title>Siagamedika - Add Product</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Form Products</h1>
                        <a href="product_view.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> View List</a>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Product</h6>
                        </div>
                        <div class="card-body">
                            <form id="productForm" class="needs-validation" novalidate action="php/function_php/produk_insert.php" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="NamaProduk">Nama Produk</label>
                                        <input type="text" class="form-control" placeholder="Isi Nama Produk..." name="NamaProduk" id="NamaProduk" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">Nama Produk harus diisi!</div>
                                    </div>
                                        <div class="form-group col-md-6">
                                        <label for="inputCategory">Category</label>
                                        <select name="Kategori" id="Kategori" class="form-control" required>
                                            <option selected disabled value="">Choose...</option>
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
                                        <div class="invalid-feedback">
                                            Pilih Kategori Valid!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea type="text" rows="5" class="form-control" name="Deskripsi" id="Deskripsi" placeholder="Isi Deskripsi..." required></textarea>
                                    <div class="invalid-feedback">
                                        Deskripsi harus diisi!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="LinkGambar">Link Gambar</label>
                                    <input type="text" class="form-control" name="LinkGambar" id="LinkGambar" placeholder="Ex: https://i.imgur.com/xmO8Lsp.jpg" required pattern="https://i\.imgur\.com/.*">
                                        <div class="invalid-feedback">
                                            Link Gambar harus diisi dan dimulai dengan https://i.imgur.com/.
                                        </div>
                                    </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" name="numHarga" id="numHarga" placeholder="Rp." required min="0">
                                        <div class="invalid-feedback">
                                            Harga Harus diisi.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="brand">Brand</label>
                                        <select name="Brand" id="Brand" class="form-control" required>
                                            <option value="" disabled selected>Choose...</option>
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
                                        <div class="invalid-feedback">
                                            Pilih Brand Valid!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="Tokopedia">Tokopedia</label>
                                        <input type="text" class="form-control" name="Tokopedia" placeholder="Isi Produk Link..." pattern="(https:\/\/(www\.)?tokopedia\.com\/.*)?">
                                        <div class="invalid-feedback">
                                            Harus diawali dengan https://tokopedia.com/
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Shopee">Shopee</label>
                                        <input type="text" class="form-control" name="Shopee" placeholder="Isi Produk Link..." pattern="(https:\/\/(www\.)?shopee\.co\.id\/.*)?">
                                        <div class="invalid-feedback">Harus diawali dengan https://shopee.co.id/</div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Blibli">Blibli</label>
                                        <input type="text" class="form-control" name="Blibli" placeholder="Isi Produk Link..." pattern="(https:\/\/(www\.)?blibli\.com\/.*)?">
                                        <div class="invalid-feedback">Harus diawali dengan https://blibli.com/</div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block my-2 btn-primary" id="submitButton">Submit</button>
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
    <script src="js/product.min.js"></script>
</body>
</html>