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
                <div class="product-box">
                    <div class="product-bar">
                        <p>showing 1-9 of 20 result</p>
                        <select name="" id="" class="">
                            <option value="a">Category</option>
                        </select>
                    </div>
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
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image" data-bs-toggle="modal" data-bs-target="#product_1">
                                    <img src="assets/img/<?php echo $p['Gambar']; ?>" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                    <li><a href="<?php echo $p['Tokopedia']; ?>" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="<?php echo $p['Shopee']; ?>" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="<?php echo $p['Blibli']; ?>" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h5 class="title">
                                    <a href="#" title="<?php echo $p['NamaProduk']; ?>" data-bs-toggle="modal" data-bs-target="#product_1">
                                        <?php echo $p['NamaProduk']; ?>
                                    </a>
                                </h5>
                                <div class="price"><?php echo "Rp ".number_format($p['Harga'],0,',','.'); ?></div>
                                <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i>
                                    Contact</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    else{
                        echo "Tida ada data ditemukan.";
                    } 
                    ?>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image">
                                    <img src="assets/img/product_2.jpg" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#" title="Doppler BT – 220 C Bistos Hand held Fetal Doppler">Doppler BT – 220 C Bistos Hand held Fetal Doppler</a></h3>
                                <div class="price">Rp 1.472.000</div>
                                <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i> Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image">
                                    <img src="assets/img/product_3.jpg" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                    <h3 class="title"><a href="#" title="Oxygen Concentrator GEA 7F-8">Oxygen Concentrator GEA7F-8</a></h3>
                                    <div class="price">Rp 19.000.000</div>
                                    <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i> Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image" data-bs-toggle="modal" data-bs-target="#product_4">
                                    <img src="assets/img/product_4.png" style="height: 250px;" class="img-fluid" alt="">
                                </a>
                                <span class="product-discount-label">-33%</span>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#" data-bs-toggle="modal" data-bs-target="#product_4" title="Serenity Medical Protective Mask 3 Ply Earloop">Serenity Medical Protective Mask 3 Ply Earloop</a></h3>
                                <div class="price"><span>Rp 50.000</span> Rp 25.000</div>
                                <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i>
                                    Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image" data-bs-toggle="modal" data-bs-target="#product_1">
                                    <img src="assets/img/product_1.png" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#" title="Decubitus mattress AD III BEAM" data-bs-toggle="modal" data-bs-target="#product_1">Decubitus mattress AD III BEAM</a></h3>
                                <div class="price">Rp 5.250.000</div>
                                <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i>
                                    Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image">
                                    <img src="assets/img/product_2.jpg" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#" title="Doppler BT – 220 C Bistos Hand held Fetal Doppler">Doppler BT – 220 C Bistos Hand held Fetal Doppler</a></h3>
                                <div class="price">Rp 1.472.000</div>
                                <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i> Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image">
                                    <img src="assets/img/product_3.jpg" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                    <h3 class="title"><a href="#" title="Oxygen Concentrator GEA 7F-8">Oxygen Concentrator GEA7F-8</a></h3>
                                    <div class="price">Rp 19.000.000</div>
                                    <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i> Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image">
                                    <img src="assets/img/product_4.png" style="height: 250px;" class="img-fluid" alt="">
                                </a>
                                <span class="product-discount-label">-33%</span>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#" title="Serenity Medical Protective Mask 3 Ply Earloop">Serenity Medical Protective Mask 3 Ply Earloop</a></h3>
                                <div class="price"><span>Rp 50.000</span> Rp 25.000</div>
                                <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i>
                                    Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image" data-bs-toggle="modal" data-bs-target="#product_1">
                                    <img src="assets/img/product_1.png" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#" title="Decubitus mattress AD III BEAM" data-bs-toggle="modal" data-bs-target="#product_1">Decubitus mattress AD III BEAM</a></h3>
                                <div class="price">Rp 5.250.000</div>
                                <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i>
                                    Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image">
                                    <img src="assets/img/product_2.jpg" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#" title="Doppler BT – 220 C Bistos Hand held Fetal Doppler">Doppler BT – 220 C Bistos Hand held Fetal Doppler</a></h3>
                                <div class="price">Rp 1.472.000</div>
                                <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i> Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image">
                                    <img src="assets/img/product_3.jpg" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                    <h3 class="title"><a href="#" title="Oxygen Concentrator GEA 7F-8">Oxygen Concentrator GEA7F-8</a></h3>
                                    <div class="price">Rp 19.000.000</div>
                                    <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i> Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="" class="image" data-bs-toggle="modal" data-bs-target="#product_4">
                                    <img src="assets/img/product_4.png" style="height: 250px;" class="img-fluid" alt="">
                                </a>
                                <span class="product-discount-label">-33%</span>
                                <ul class="product-links">
                                    <li><a href="#" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                    <li><a href="#" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                    <li><a href="#" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#" data-bs-toggle="modal" data-bs-target="#product_4" title="Serenity Medical Protective Mask 3 Ply Earloop">Serenity Medical Protective Mask 3 Ply Earloop</a></h3>
                                <div class="price"><span>Rp 50.000</span> Rp 25.000</div>
                                <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i>
                                    Contact</a>
                            </div>
                        </div>
                    </div>
                    
                        
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
        </section>

    <?php include('layout/modal_prd_desc.php')?>
    <?php include('layout/modal_prd_desc_disc.php')?>

    </main><!-- End #main -->

    <?php include('layout/footer.php')?>

    <?php include('layout/script.php')?>

</body>

</html>