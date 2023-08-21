<div class="row gy-4">
    <div class="col-lg-3">
        <ul class="nav nav-tabs flex-column">
            <?php
            $categories = array();
            $kategoriQuery = mysqli_query($koneksi, "SELECT * FROM kategori LIMIT 6");
            while ($row = mysqli_fetch_assoc($kategoriQuery)) {
                $categories[$row['kode_kategori']] = array(
                    'NamaKategori' => $row['NamaKategori'],
                    'tabId' => "tab-" . $row['kode_kategori']
                );
            }

            foreach ($categories as $index => $category) {
                $isActive = ($index === array_keys($categories)[0]) ? "active show" : "";
            ?>
                <li class="nav-item">
                    <a class="nav-link <?= $isActive ?>" data-bs-toggle="tab" href="#<?= $category['tabId'] ?>">
                        <?= $category['NamaKategori'] ?>
                    </a>
                </li>
            <?php
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="product-page.php">Selengkapnya</a>
            </li>
        </ul>
    </div>
    <div class="col-lg-9">
        <div class="tab-content">
            <?php
            foreach ($categories as $index => $category) {
                $isActive = ($index === array_keys($categories)[0]) ? "active show" : "";
            ?>
                <div class="tab-pane <?= $isActive ?>" id="<?= $category['tabId'] ?>">
                    <div class="category-product swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            <?php
                            $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_kategori = '{$index}'");
                            if (mysqli_num_rows($produk) > 0) {
                                $slideCount = 0;
                                foreach ($produk as $p) {
                                    if ($slideCount < 4) {
                            ?>
                                    <div class="swiper-slide">
                                        <div class="category-wrap">
                                            <div class="product-grid">
                                                <div class="product-image">
                                                    <a href="" class="image" title="<?php echo $p['NamaProduk']; ?>" data-bs-toggle="modal" data-bs-target="#product_<?php echo $p['KodeProduk']; ?>">
                                                        <img src="<?php echo $p['Gambar']; ?>" class="img-fluid" alt="">
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
                                                    <a class="whatsapp-btn" href="https://api.whatsapp.com/send?phone=6285341746323&text=Halo,%20apakah%20Stock%20dari%20<?php echo $p['NamaProduk'];  ?>%20ready%20?%20"><i class="bi bi-whatsapp"></i> Contact</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                            <?php
                                    $slideCount++;
                                    }
                                }
                            }
                            ?>
                                <div class="swiper-slide">
                                    <div class="category-wrap">
                                        <div class="product-grid">
                                            <a href="product-page.php">
                                            <div class="selengkapnya">
                                                <div class="circle position-absolute start-50 translate-middle">
                                                    <i class="fas fa-arrow-right"></i>
                                                    <p class="text-light text-center position-absolute top-100 start-50 translate-middle mt-3">Selengkapnya</p>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div> 
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
foreach ($categories as $index => $category) {
    $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_kategori = '{$index}'");
    if (mysqli_num_rows($produk) > 0) {
        foreach ($produk as $p) {
    ?>
<!-- Modal -->
<?php include('layout/modal_prd_desc.php')?>
<?php
        }
    }
}
?>