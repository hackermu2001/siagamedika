<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php
    // Include your database connection
    include 'koneksi.php';

    // Define the page_url for Home
    $homePageUrl = 'Halaman Produk';

    // Query to retrieve data from the database based on the page_url for Home
    $query = "SELECT PageTitle, Description, FokusKeyword FROM seo WHERE page_url = '$homePageUrl'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $pageTitle = $row['PageTitle'];
        $description = $row['Description'];
        $keywords = $row['FokusKeyword'];
    } else {
        // Default values in case no data is retrieved from the database
        $pageTitle = "Undefined!";
        $description = "";
        $keywords = "";
    }
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
                    <h2>Daftar Produk</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Brand</li>
                        <?php if (!empty($selectedBrand)) { ?>
                        <li><?php echo $selectedBrand; ?></li>
                        <?php } ?>
                    </ol>
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