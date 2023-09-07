<!DOCTYPE html>
<html lang="en">
<?php
// Ambil kata kunci pencarian dari URL
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Gunakan kata kunci pencarian dalam query pencarian Anda
$query = "SELECT p.KodeProduk AS KodeProduk, p.NamaProduk AS NamaProduk, k.NamaKategori AS NamaKategori, b.NamaBrand AS NamaBrand, p.Harga AS Harga, p.Gambar AS Gambar, p.Keterangan AS Keterangan, p.Tokopedia AS Tokopedia, p.Blibli AS Blibli, p.Shopee AS Shopee 
            FROM produk p 
            INNER JOIN kategori k ON p.kode_kategori = k.kode_kategori 
            INNER JOIN brand b ON p.SKU_BRND = b.SKU_BRND 
            WHERE (1=1)";

// Jika ada kata kunci pencarian, tambahkan kondisi pencarian ke query
if (!empty($searchQuery)) {
    $query .= " AND (p.NamaProduk LIKE '%$searchQuery%')";
}

$query .= " ORDER BY p.KodeProduk DESC";

// Lanjutkan dengan eksekusi query dan menampilkan hasilnya seperti sebelumnya.
?>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php if (!empty($searchQuery)) { ?>
        <title><?php echo '"' . $searchQuery . '"'; ?> Result</title>
    <?php } else { ?>
        <title>Daftar Pencarian - PT Siagamedika Abadi Karya</title>
    <?php } ?>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('layout/header.php')?>

</head>

<body>
    <?php include('koneksi.php');
    $queryBarang = "SELECT COUNT(*) as total_barang FROM produk";
    $resultBarang = mysqli_query($koneksi, $queryBarang);
    $rowBarang = mysqli_fetch_assoc($resultBarang);
    $totalBarang = $rowBarang['total_barang'];
    ?>
    <?php include('layout/topbar.php')?>
    <?php include('layout/nav_inner.php')?>

    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-start align-items-center">
                    <?php if (!empty($searchQuery)) { ?>
                        <h2><?php echo '"' . $searchQuery . '"'; ?> Result</h2>
                    <?php } else { ?>
                        <h2>Daftar Pencarian</h2>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs Section -->
        <section class="product-page">
            <div class="container">
                <div class="search-container_searchpage border border-primary-subtle">
                    <form method="GET" action="search.php">
                        <input type="text" id="search" name="q" placeholder="Cari Barang disini..." value="<?php echo $searchQuery; ?>" />
                        <button id="search-button" type="submit"><i class="fas fa-search me-2"></i>Search</button>
                    </form>
                </div>
                <div id="search-results" class="row gy-4 my-3">
    <?php
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

    if (!empty($searchQuery)) {
        // Pengguna melakukan pencarian
        $query = "SELECT p.KodeProduk AS KodeProduk, p.NamaProduk AS NamaProduk, k.NamaKategori AS NamaKategori, b.NamaBrand AS NamaBrand, p.Harga AS Harga, p.Gambar AS Gambar, p.Keterangan AS Keterangan, p.Tokopedia AS Tokopedia, p.Blibli AS Blibli, p.Shopee AS Shopee 
                    FROM produk p 
                    INNER JOIN kategori k ON p.kode_kategori = k.kode_kategori 
                    INNER JOIN brand b ON p.SKU_BRND = b.SKU_BRND 
                    WHERE (1=1) AND (p.NamaProduk LIKE '%$searchQuery%') 
                    ORDER BY p.KodeProduk DESC";

        // Tampilkan hasil pencarian
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            // Tampilkan hasil pencarian
            while ($p = mysqli_fetch_array($result)) {
                ?>
                <div class="col-lg-3 col-md-6 col-12">
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
    } else {
        // Pengguna tidak melakukan pencarian, tampilkan semua produk dengan pagination
        $produkPerPage = 12; // Jumlah produk per halaman
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini

        $offset = ($currentPage - 1) * $produkPerPage; // Hitung offset
        // Initialize the counter
        $counter = $offset + 1;

        // Query untuk mendapatkan total jumlah produk
        $totalProdukQuery = "SELECT COUNT(*) AS total FROM produk";
        $totalProdukResult = mysqli_query($koneksi, $totalProdukQuery);
        $totalProdukRow = mysqli_fetch_assoc($totalProdukResult);
        $totalRows = $totalProdukRow['total'];

        // Menghitung total halaman berdasarkan jumlah hasil pencarian
        $totalPages = ceil($totalRows / $produkPerPage);

        // Query untuk mendapatkan data produk dengan batasan pagination
        $query = "SELECT p.KodeProduk AS KodeProduk, p.NamaProduk AS NamaProduk, k.NamaKategori AS NamaKategori, b.NamaBrand AS NamaBrand, p.Harga AS Harga, p.Gambar AS Gambar, p.Keterangan AS Keterangan, p.Tokopedia AS Tokopedia, p.Blibli AS Blibli, p.Shopee AS Shopee 
                    FROM produk p 
                    INNER JOIN kategori k ON p.kode_kategori = k.kode_kategori 
                    INNER JOIN brand b ON p.SKU_BRND = b.SKU_BRND 
                    ORDER BY p.KodeProduk DESC 
                    LIMIT $offset, $produkPerPage";

        // Tampilkan semua produk dengan pagination
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            // Tampilkan semua produk dengan pagination
            while ($p = mysqli_fetch_array($result)) {
                ?>
                <div class="col-lg-3 col-md-6 col-12">
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
                </div>
                <?php
            }
        } else {
            echo '<center> <span class="m-0 my-5">Tidak ada produk ditemukan.</span> </center>';
        }

        // Display pagination
        ?>
        <div class="product-pagination d-flex justify-content-center">
            <ul>
                <?php if ($currentPage > 1) { ?>
                    <li><a href="?page=<?php echo $currentPage - 1; ?>"><i class="bi bi-arrow-left"></i></a></li>
                <?php } ?>

                <?php
                // Tentukan nomor halaman pertama dan terakhir yang akan ditampilkan
                $firstPage = max(1, $currentPage - 1);
                $lastPage = min($totalPages, $currentPage + 1);

                // Tampilkan tautan halaman
                for ($page = $firstPage; $page <= $lastPage; $page++) {
                    $isActive = $page == $currentPage ? 'active' : '';
                    ?>
                    <li><a href="?page=<?php echo $page; ?>" class="<?php echo $isActive; ?>"><?php echo $page; ?></a></li>
                <?php } ?>

                <?php if ($currentPage < $totalPages) { ?>
                    <li><a href="?page=<?php echo $currentPage + 1; ?>"><i class="bi bi-arrow-right"></i></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }
    ?> 
</div>

            </div>
        </section>
       
    </main><!-- End #main -->

    <?php include('layout/footer.php')?>
    <?php include('layout/script.php')?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>