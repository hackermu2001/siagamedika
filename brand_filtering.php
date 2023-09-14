<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <?php
    include('koneksi.php');

    // 1. Periksa apakah parameter "brand" telah didefinisikan di URL
    if (isset($_GET['brand'])) {
        $selectedBrand = $_GET['brand'];

        // 2. Gunakan nilai dari parameter "brand" untuk mencari data SEO yang sesuai dari database
        $sqlSeo = "SELECT PageTitle, Description, FokusKeyword FROM seo WHERE page_url LIKE ?";
        $stmt = mysqli_prepare($koneksi, $sqlSeo);
        $param = "%Halaman Brand : $selectedBrand%";
        mysqli_stmt_bind_param($stmt, 's', $param);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $pageTitle, $description, $keywords);
        
        // 3. Tampilkan data SEO tersebut di dalam elemen <title> dan dalam elemen <meta>
        if (mysqli_stmt_fetch($stmt)) {
            // Mengganti judul halaman menjadi PageTitle jika PageTitle tidak kosong, jika kosong, gunakan "Undefined!"
            echo '<title>' . (!empty($pageTitle) ? $pageTitle : 'Undefined!') . '</title>';
            echo '<meta content="' . $description . '" name="description">';
            echo '<meta content="' . $keywords . '" name="keywords">';
        } else {
            // Jika data SEO tidak ditemukan, tampilkan "Undefined!" untuk judul halaman
            echo '<title>Undefined!</title>';
            // Anda dapat memutuskan apakah ingin menggunakan deskripsi dan kata kunci yang sama atau kosong
            echo '<meta content="" name="description">';
            echo '<meta content="" name="keywords">';
        }
            mysqli_stmt_close($stmt);
        }

    $selectedBrand = isset($_GET['brand']) ? $_GET['brand'] : '';
?>
    
    <?php include('layout/header.php')?>
</head>

<body>
    <?php include('koneksi.php');
    $selectedBrand = isset($_GET['brand']) ? $_GET['brand'] : '';
    if (!$selectedBrand) {
        header("Location: product-page.php");
        exit(); // Make sure to exit after redirection
    } 
    $targetSKU_BRND = $_GET['brand'];

    // Query to count the total number of products associated with the specified brand
    $queryBarangBrand = "SELECT COUNT(*) as total_barangBrand FROM produk WHERE SKU_BRND = '$targetSKU_BRND'";

    $resultBarangBrand = mysqli_query($koneksi, $queryBarangBrand);

    if (!$resultBarangBrand) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    $totalBarangBrandRow = mysqli_fetch_assoc($resultBarangBrand);
    $totalBarangBrand = $totalBarangBrandRow['total_barangBrand'];
    ?>
    <?php include('layout/topbar.php')?>
    <?php include('layout/nav_inner.php')?>

    <main id="main">

       <!-- ======= Breadcrumbs Section ======= -->
       <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="search-container_searchpage border border-primary-subtle mb-2 rounded-0">
                        <form method="GET" action="search.php">
                            <input type="text" id="search" class="form-control rounded-0" name="q" placeholder="Cari Barang disini..." value="" />
                            <button id="search-button" class="rounded-0" type="submit"><i class="fas fa-search me-2"></i>Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="product-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                            <div class="product-bar d-flex align-items-center flex-wrap">
                                <p>showing <?php echo $totalBarangBrand;?> result</p>
                                <select onchange="handleBrandChange(this)">
                                    <?php
                                        $brands = mysqli_query($koneksi, "SELECT SKU_BRND, NamaBrand FROM brand");
                                        while ($brand = mysqli_fetch_assoc($brands)) {
                                            $selected = '';
                                            if ($selectedBrand === $brand['SKU_BRND']) {
                                                $selected = 'selected';
                                            }
                                            echo '<option value="' . $brand['SKU_BRND'] . '" ' . $selected . '>' . $brand['NamaBrand'] . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        <div class="row gy-4">
                            <?php
                                $selectedBrand = isset($_GET['brand']) ? $_GET['brand'] : '';

                                if (!empty($selectedBrand)) {
                                    // Query to fetch the brand name
                                    $brandNameQuery = "SELECT NamaBrand FROM brand WHERE SKU_BRND = '$selectedBrand'";
                                    $brandNameResult = mysqli_query($koneksi, $brandNameQuery);
                                    $brandNameRow = mysqli_fetch_assoc($brandNameResult);
                                    $selectedBrandName = $brandNameRow['NamaBrand'];
                                }
                                
                                // Pagination setup
                                $produkPerPage = 9; // Number of products per page
                                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page
                                
                                $offset = ($currentPage - 1) * $produkPerPage; // Calculate offset
                                
                                // Query to fetch products based on the selected brand with pagination
                                $query = "SELECT p.KodeProduk AS KodeProduk, p.NamaProduk AS NamaProduk, k.NamaKategori AS NamaKategori, b.NamaBrand AS NamaBrand, p.Harga AS Harga, p.Gambar AS Gambar, p.Keterangan AS Keterangan, p.Tokopedia AS Tokopedia, p.Blibli AS Blibli, p.Shopee AS Shopee 
                                    FROM produk p 
                                    INNER JOIN kategori k ON p.kode_kategori = k.kode_kategori 
                                    INNER JOIN brand b ON p.SKU_BRND = b.SKU_BRND 
                                    WHERE b.SKU_BRND = '$selectedBrand'
                                    LIMIT $offset, $produkPerPage";
                                
                                $result = mysqli_query($koneksi, $query);
                                if(mysqli_num_rows($result) > 0) {
                                while ($p = mysqli_fetch_array($result)) { 
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-12">
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
                            } else {
                                echo '<center> <span class="m-0 my-5">Tidak ada produk ditemukan.</span> </center>';
                            }
                            ?>
                            <?php if (mysqli_num_rows($result) > $produkPerPage) { ?>                          
                            <div class="product-pagination d-flex justify-content-center">
                                <ul>
                                    <?php if ($currentPage > 1) { ?>
                                        <li><a href="?brand=<?php echo $selectedBrand; ?>&page=<?php echo $currentPage - 1; ?>"><i class="bi bi-arrow-left"></i></a></li>
                                    <?php } ?>

                                    <?php
                                    // Generate pagination links
                                    $totalPages = ceil(mysqli_num_rows($result) / $produkPerPage);
                                    for ($page = 1; $page <= $totalPages; $page++) {
                                        $isActive = $page == $currentPage ? 'active' : '';
                                    ?>
                                        <li><a href="?brand=<?php echo $selectedBrand; ?>&page=<?php echo $page; ?>" class="<?php echo $isActive; ?>"><?php echo $page; ?></a></li>
                                    <?php } ?>

                                    <?php if ($currentPage < $totalPages) { ?>
                                        <li><a href="?brand=<?php echo $selectedBrand; ?>&page=<?php echo $currentPage + 1; ?>"><i class="bi bi-arrow-right"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="product-sidebar">
                            <div class="product-widget category-widget">
								<h1>Kategori</h1>
								<ul>
                                    <li><a href="product-page.php" class="active">All Categories</a></li>
                                <?php
                                    $categories = mysqli_query($koneksi, "SELECT kode_kategori, NamaKategori FROM kategori");
                                    while ($category = mysqli_fetch_assoc($categories)) {
                                    ?>
                                        <li><a href="categories_filtering.php?category=<?= $category['kode_kategori']; ?>"><?= $category['NamaKategori']; ?></a></li>
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