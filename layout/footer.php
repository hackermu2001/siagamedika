<!-- ======= Footer ======= -->
<footer id="footer">
<?php
include 'koneksi.php'; 
?>
<div class="footer-top d-none d-md-flex">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
                <img src="assets/img/logo1.png" width="100" class="pb-2" alt="">
                <p>
                    Jl. Abd. Kadir No.9d, Balang Baru, <br>Kec. Tamalate, Kota Makassar, <br>Sulawesi Selatan
                    90224
                    <br>
                    <strong>Phone:</strong> +62 851-0551-5454<br>
                    <strong>Email:</strong> pt.siagamedika@gmail.com<br>
                </p>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
                <h4>Category</h4>
                    <ul>
                    <?php
                        $categories = mysqli_query($koneksi, "SELECT kode_kategori, NamaKategori FROM kategori LIMIT 4");
                        while ($category = mysqli_fetch_assoc($categories)) {
                            $categoryLink = "categories_filtering.php?category=" . $category['kode_kategori'];
                            echo '<li><i class="bx bx-chevron-right"></i> <a class="text-truncate" href="' . $categoryLink . '">' . $category['NamaKategori'] . '</a></li>';
                        }
                    ?>

                    </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Brand</h4>
                <ul>
                    <?php
                    $Brand = mysqli_query($koneksi, "SELECT SKU_BRND,NamaBrand FROM brand LIMIT 4");
                    while($b = mysqli_fetch_array($Brand)){

                    ?>
                    <li><i class="bx bx-chevron-right"></i> <a href="brand_filtering.php?brand=<?php echo $b['SKU_BRND']; ?>"><?php echo $b['NamaBrand']; ?></a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-search">
                <h4>Search Our Product</h4>
                <p>Temukan produk kesehatan terbaik di Siagamedika dan jaga kesehatan Anda. Cari sekarang!</p>
                <form method="get" action="search.php">
                    <input type="text" name="q"><input type="submit" value="Search">
                </form>
            </div>

        </div>
    </div>
</div>

<div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
            &copy; Copyright <strong><span>PT. Siaga Medika Abadi Karya</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Developed by <a href="#">Rumah Pintar Inovasi</a>
        </div>
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://www.tokopedia.com/siagamedikastore" class="tokopedia"><i class="ft-tokopedia"></i></a>
        <a href="https://www.blibli.com/merchant/siagamed/SID-60039" class="blibli"><i class="ft-blibli"></i></a>
        <a href="https://shopee.co.id/siaga_medika_store" class="shopee"><i class="ft-shopee"></i></a>
        <a href="https://wa.me/6285341746323" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
    </div>
</div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>