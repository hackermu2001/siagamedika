<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

// Check if the "id" parameter exists in the URL
if (!isset($_GET["id"])) {
    header("Location: product_view.php"); // Redirect to an error page or any other desired action
    exit;
}

// Preventing going back
header("Cache-Control: private, no-store, max-age=0, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('layout/head.php') ?>
    <meta name="description" content="">
    <meta name="author" content=""> 
    <title>Siagamedika - Edit Form</title>
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
                <?php
                $KodeProduk = $_GET['id'];
                $produk = mysqli_query($koneksi,"SELECT p.KodeProduk AS KodeProduk,p.NamaProduk AS NamaProduk,k.NamaKategori AS Kategori,
                b.NamaBrand AS Brand,p.SKU_BRND AS SKU_BRND ,p.Harga AS Harga,p.Gambar AS Gambar,p.Keterangan AS Keterangan,p.TokoPedia AS Tokopedia,p.Blibli AS Blibli,
                p.Shopee AS Shopee,p.kode_kategori AS KodeKategori FROM produk p INNER JOIN kategori k INNER JOIN brand b ON (p.kode_kategori=k.kode_kategori AND p.SKU_BRND=b.SKU_BRND) 
                WHERE (1=1) AND p.KodeProduk='$KodeProduk'"); 
                $p = mysqli_fetch_assoc($produk);
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit <?php echo $p['NamaProduk']; ?></h1>
                        <a href="product_view.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> View List</a>
                    </div>
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <form id="productForm" action="php/function_php/produk_update.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="hidden" class="form-control" name="Kode" value="<?php echo $KodeProduk; ?>">
                                        <label for="NamaProduk">Nama Produk</label>
                                        <input id="NamaProduk" type="text" class="form-control" name="NamaProduk" value="<?php echo $p['NamaProduk']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="inputCategory">Category</label>
                                        <select id="Kategori" name="Kategori" class="form-control" required>
                                        <?php
                                        $kategori = mysqli_query($koneksi,"SELECT kode_kategori, NamaKategori FROM kategori");
                                        $selectedKategori = isset($_POST['Kategori']) ? $_POST['Kategori'] : $p['KodeKategori']; // Ambil kategori yang dipilih dari POST data, atau gunakan yang ada pada $p

                                        while ($k = mysqli_fetch_array($kategori)) {
                                            $isSelected = ($k['kode_kategori'] == $selectedKategori) ? "selected" : "";
                                            ?>
                                            <option value="<?php echo $k['kode_kategori']; ?>" <?php echo $isSelected; ?>>
                                                <?php echo $k['NamaKategori']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea id="Deskripsi" type="text" rows="5" class="form-control" name="Deskripsi" placeholder="" required><?php echo $p['Keterangan'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="LinkGambar">Link Gambar</label>
                                    <input id="LinkGambar" type="text" class="form-control" name="LinkGambar" placeholder="Ex: https://i.imgur.com/xmO8Lsp.jpg" value="<?php echo $p['Gambar'] ?>" required>
                                    </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="harga">Harga</label>
                                        <input id="numHarga" type="number" class="form-control" name="numHarga" placeholder="Rp." value="<?php echo $p['Harga']; ?>" min="0" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="brand">Brand</label>
                                        <select id="Brand" name="Brand" class="form-control">
                                        <?php
                                        $Brand = mysqli_query($koneksi,"SELECT SKU_BRND,NamaBrand FROM brand");
                                        $selectedBrand = isset($_POST['Brand']) ? $_POST['Brand'] : $p['SKU_BRND'];

                                        while ($b = mysqli_fetch_array($Brand)) {
                                            $isSelected = ($b['SKU_BRND'] == $selectedBrand) ? "selected" : "";
                                            ?>
                                            <option value="<?php echo $b['SKU_BRND']; ?>" <?php echo $isSelected; ?>>
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
                                        <input type="text" class="form-control" name="Tokopedia" placeholder="Isi Produk Link..." 
                                            value="<?php echo $p['Tokopedia']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Shopee">Shopee</label>
                                        <input type="text" class="form-control" name="Shopee" placeholder="Isi Produk Link..." 
                                            value="<?php echo $p['Shopee']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Blibli">Blibli</label>
                                        <input type="text" class="form-control" name="Blibli" placeholder="Isi Produk Link..." 
                                            value="<?php echo $p['Blibli']; ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block my-2 btn-primary">Save Changes</button>
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