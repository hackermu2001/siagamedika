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
                                foreach ($produk as $p) {
                            ?>
                                    <div class="swiper-slide">
                                        <div class="category-wrap">
                                            <div class="product-grid">
                                                <div class="product-image">
                                                    <a href="" class="image">
                                                        <img src="<?php echo $p['Gambar']; ?>" class="img-fluid" alt="">
                                                    </a>
                                                    <ul class="product-links">
                                                        <li><a href="<?php echo $p['Tokopedia']; ?>" data-tip="Tokopedia"><i class="ft-tokopedia"></i></a></li>
                                                        <li><a href="<?php echo $p['Blibli']; ?>" data-tip="Shopee"><i class="ft-shopee"></i></a></li>
                                                        <li><a href="<?php echo $p['Shopee']; ?>" data-tip="Blibli"><i class="ft-blibli"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h3 class="title"><a href="#" title="<?php echo $p['NamaProduk']; ?>"><?php echo $p['NamaProduk']; ?></a></h3>
                                                    <div class="price"><?php echo $p['Harga']; ?></div>
                                                    <a class="whatsapp-btn" href="#"><i class="bi bi-whatsapp"></i> Contact</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
