<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php
    include('koneksi.php');

    // 1. Periksa apakah parameter "category" telah didefinisikan di URL
    if (isset($_GET['category'])) {
        $selectedCategory = $_GET['category'];

        // 2. Gunakan nilai dari parameter "category" untuk mencari data SEO yang sesuai dari database
        $sqlSeo = "SELECT PageTitle, Description, FokusKeyword FROM seo WHERE page_url LIKE ?";
        $stmt = mysqli_prepare($koneksi, $sqlSeo);
        $param = "%Halaman Kategori : $selectedCategory%";
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

    $selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

    $query = "SELECT p.KodeProduk AS KodeProduk, p.NamaProduk AS NamaProduk, k.NamaKategori AS NamaKategori, b.NamaBrand AS NamaBrand, p.Harga AS Harga, p.Gambar AS Gambar, p.Keterangan AS Keterangan, p.Tokopedia AS Tokopedia, p.Blibli AS Blibli, p.Shopee AS Shopee 
        FROM produk p 
        INNER JOIN kategori k ON p.kode_kategori = k.kode_kategori 
        INNER JOIN brand b ON p.SKU_BRND = b.SKU_BRND 
        WHERE (1=1) ";

    if (!empty($selectedCategory)) {
        $query .= " AND k.kode_kategori = '$selectedCategory'";
    } 

    $targetKodeKategori = $_GET['category'];

    // Query to count the total number of products in the specified category
    $queryBarangKategori = "SELECT COUNT(*) as total_barangKategori FROM produk WHERE kode_kategori = '$targetKodeKategori'";

    $resultBarangKategori = mysqli_query($koneksi, $queryBarangKategori);

    if (!$resultBarangKategori) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    $totalBarangKategoriRow = mysqli_fetch_assoc($resultBarangKategori);
    $totalBarangKategori = $totalBarangKategoriRow['total_barangKategori'];

    $result = mysqli_query($koneksi, $query);
    ?>
    <?php include('layout/header.php')?>

</head>

<body>
    <?php include('koneksi.php');
    $selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';
    if (!$selectedCategory) {
        header("Location: product-page.php");
        exit(); // Make sure to exit after redirection
    }
    ?>
    <?php include('layout/topbar.php')?>
    <?php include('layout/nav_inner.php')?>

    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Daftar Produk</h2>
                    <form method="get" action="search.php" class="search-container mt-3">
                        <input type="text" id="search" name="q" placeholder="Cari Barang disini..." />
                        <button id="search-button"><i class="fas fa-search me-2"></i>Search</button>
                    </form>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Category</li>
                        <?php if (!empty($selectedCategory)) { ?>
                        <li><?php echo $selectedCategory; ?></li>
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
                                <p>showing <?php echo $totalBarangKategori;?> result</p>
                                <select onchange="handleBrandChange(this)">
                                    <option disabled selected>Pilih Brand...</option>
                                    <?php
                                    $brands = mysqli_query($koneksi, "SELECT SKU_BRND, NamaBrand FROM brand");
                                    while ($brand = mysqli_fetch_assoc($brands)) {
                                        echo '<option value="' . $brand['SKU_BRND'] . '">' . $brand['NamaBrand'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        <div class="row gy-4">
                            <?php
                            $produkPerPage = 6; // Jumlah produk per halaman
                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini
                            $offset = ($currentPage - 1) * $produkPerPage; // Hitung offset
                            // Query untuk mendapatkan total jumlah produk
                            $totalProdukQuery = "SELECT COUNT(*) AS total FROM produk p 
                                                INNER JOIN kategori k ON p.kode_kategori = k.kode_kategori 
                                                WHERE k.kode_kategori = '$selectedCategory'";
                            $totalProdukResult = mysqli_query($koneksi, $totalProdukQuery);
                            $totalProdukRow = mysqli_fetch_assoc($totalProdukResult);
                            $totalProduk = $totalProdukRow['total'];

                            // Calculate the total number of pages based on filtered products
                            $totalPages = ceil($totalProduk / $produkPerPage);

                            // Query untuk mendapatkan data produk dengan batasan pagination
                            //if (!empty($selectedCategory)) {
                                // Add the category filter to the query
                                $query = "SELECT p.KodeProduk AS KodeProduk, p.NamaProduk AS NamaProduk, k.NamaKategori AS NamaKategori, 
                                            b.NamaBrand AS NamaBrand, p.Harga AS Harga, p.Gambar AS Gambar, p.Keterangan AS Keterangan, 
                                            p.Tokopedia AS Tokopedia, p.Blibli AS Blibli, p.Shopee AS Shopee FROM produk p INNER JOIN kategori k ON 
                                            p.kode_kategori = k.kode_kategori INNER JOIN brand b ON p.SKU_BRND = b.SKU_BRND WHERE (1=1) AND 
                                            k.kode_kategori = '$selectedCategory'";
                            //}
                            
                            $query .= " LIMIT $offset, $produkPerPage";

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
                                    <li><a href="?category=<?php echo $selectedCategory; ?>&page=<?php echo $currentPage - 1; ?>"><i class="bi bi-arrow-left"></i></a></li>
                                <?php } ?>

                                <?php
                                // Tentukan nomor halaman pertama dan terakhir yang akan ditampilkan
                                $firstPage = max(1, $currentPage - 1);
                                $lastPage = min($totalPages, $currentPage + 1);

                                // Tampilkan tautan halaman
                                for ($page = $firstPage; $page <= $lastPage; $page++) {
                                    $isActive = $page == $currentPage ? 'active' : '';
                                ?>
                                    <li><a href="?category=<?php echo $selectedCategory; ?>&page=<?php echo $page; ?>" class="<?php echo $isActive; ?>"><?php echo $page; ?></a></li>
                                <?php } ?>

                                <?php if ($currentPage < $totalPages) { ?>
                                    <li><a href="?category=<?php echo $selectedCategory; ?>&page=<?php echo $currentPage + 1; ?>"><i class="bi bi-arrow-right"></i></a></li>
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
                                    <li><a href="product-page.php">All Categories</a></li>
                                    <?php
                                    $categories = mysqli_query($koneksi, "SELECT kode_kategori, NamaKategori FROM kategori");
                                    while ($category = mysqli_fetch_assoc($categories)) {
                                        $categoryLink = "categories_filtering.php?category=" . $category['kode_kategori'];
                                        $isActive = $selectedCategory == $category['kode_kategori'] ? 'active' : ''; // Check if current category is selected

                                        echo '<li><a href="' . $categoryLink . '" class="' . $isActive . '">' . $category['NamaKategori'] . '</a></li>';
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