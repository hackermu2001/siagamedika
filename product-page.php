<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Daftar Produk - PT. Siaga Medika Abadi Karya</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('layout/header.php')?>

</head>

<body>
    <?php include('koneksi.php')?>
    <?php include('layout/topbar.php')?>
    <?php include('layout/nav_inner.php')?>

    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Daftar Produk</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Daftar Produk</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="product-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                            <div class="product-bar d-flex align-items-center justify-content-md-between justify-content-center flex-wrap">
                                <p>showing 1-9 of 20 result</p>
                                <select name="" id="" class="">
                                    <option disabled selected>Choose Kategori...</option>
                                    <?php
                                    $categories = mysqli_query($koneksi, "SELECT kode_kategori, NamaKategori FROM kategori");
                                    while ($category = mysqli_fetch_assoc($categories)) {
                                    ?>
                                        <option value="<?= $category['kode_kategori']; ?>"><?= $category['NamaKategori']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        <div class="row gy-4">
                            <?php
                            $produk = mysqli_query($koneksi, "SELECT p.KodeProduk AS KodeProduk,p.NamaProduk AS NamaProduk,p.kode_kategori AS 
                                    KodeKategori,k.NamaKategori AS NamaKategori,p.SKU_BRND AS SKU_BRND,b.NamaBrand AS NamaBrand,p.Harga AS 
                                    Harga,p.Gambar AS Gambar,p.Keterangan AS Keterangan,p.Tokopedia AS Tokopedia,p.Blibli AS Blibli,p.Shopee 
                                    AS Shopee FROM produk p INNER JOIN brand b INNER JOIN kategori k ON (p.SKU_BRND=b.SKU_BRND AND 
                                    k.kode_kategori=p.kode_kategori) WHERE (1=1)"); 
                            if(mysqli_num_rows($produk) > 0){
                                foreach($produk AS $p){
                            ?>
                            <div class="col-md-4">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="" class="image" data-bs-toggle="modal" data-bs-target="#product_<?php echo $p['KodeProduk']; ?>">
                                            <img src="<?php echo $p['Gambar']; ?>" class="img-fluid" style="height: 250px;" alt="">
                                        </a>
                                        <ul class="product-links">
                                        <?php if (!empty($p['Tokopedia'])) { ?>
                                            <li><a href="<?php echo $p['Tokopedia']; ?>" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                        <?php } ?>
                                        <?php if (!empty($p['Shopee'])) { ?>
                                            <li><a href="<?php echo $p['Shopee']; ?>" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                        <?php } ?>
                                        <?php if (!empty($p['Blibli'])) { ?>
                                            <li><a href="<?php echo $p['Blibli']; ?>" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#" title="<?php echo $p['NamaProduk']; ?>" data-bs-toggle="modal" data-bs-target="#product_<?php echo $p['KodeProduk']; ?>"><?php echo $p['NamaProduk']; ?></a></h3>
                                        <div class="price"><?php echo "Rp ".number_format($p['Harga'],0,',','.'); ?></div>
                                        <a class="whatsapp-btn" href="https://api.whatsapp.com/send?phone=6285341746323&text=Halo,%20apakah%20Stock%20dari%20<?php echo $p['NamaProduk'];  ?>%20ready%20?%20" target="_blank"><i class="bi bi-whatsapp"></i> Contact</a>
                                    </div>
                                </div>
                                <?php include('layout/modal_prd_desc.php')?>
                            </div>
                            <?php
                                }
                            }
                            else{
                                echo "Tidak ada data ditemukan.";
                            } 
                            ?>
                            
                            
                                
                            <div class="product-pagination d-flex justify-content-center">
                                <ul>
                                    <li><a href="#"><i class="bi bi-arrow-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#"><i class="bi bi-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="product-sidebar">
                        <div class="product-widget category-widget">
								<h1>Brand</h1>
								<ul>
                                <?php
                                    $brands = mysqli_query($koneksi, "SELECT SKU_BRND, NamaBrand FROM brand");
                                    while ($brand = mysqli_fetch_assoc($brands)) {
                                    ?>
                                        <li><a href="#"><?= $brand['NamaBrand']; ?></a></li>
                                    <?php
                                    }
                                    ?>
								</ul>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    

    </main><!-- End #main -->

    <?php include('layout/footer.php')?>

    <?php include('layout/script.php')?>

</body>

</html>