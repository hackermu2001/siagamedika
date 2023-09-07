<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blog Title || PT. SIAGA MEDIKA ABADI KARYA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('layout/header.php')?>

</head>

<body>
    <?php include('layout/topbar.php')?>
    <?php include('layout/nav_inner.php')?>

    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Search Result</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Search Result</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs Section -->
        <section class="product-page">
            <div class="container">
                <div class="search-container_searchpage border border-primary-subtle">
                    <input type="text" id="search" placeholder="Cari Barang disini..." />
                    <button id="search-button"><i class="fas fa-search me-2"></i>Search</button>
                </div>
                <div class="row gy-4 my-3">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="product-grid"> 
                            <div class="product-image">
                                <a href="" class="image" data-bs-toggle="modal" data-bs-target="#product_100">
                                    <img src="https://i.imgur.com/4MNJeO7.jpg" class="img-fluid" style="height: 250px;" alt="">
                                </a>
                                <ul class="product-links">
                                                                                                                                                                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#" title="Low Temp Plasma Sterilizer HMTS-80" data-bs-toggle="modal" data-bs-target="#product_100">Low Temp Plasma Sterilizer HMTS-80</a></h3>
                                <div class="price">Rp 1.300.000.000</div>
                                <a class="whatsapp-btn" href="https://api.whatsapp.com/send?phone=6285341746323&amp;text=Halo,%20apakah%20Stock%20dari%20Low Temp Plasma Sterilizer HMTS-80%20ready%20?%20" target="_blank"><i class="bi bi-whatsapp"></i> Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-pagination d-flex justify-content-center">
                    <ul>
                        <li><a href=""><i class="bi bi-arrow-left"></i></a></li>        
                        <li><a href="" class="active">1</a></li>
                        <li><a href="" class="">2</a></li>
                        <li><a href=""><i class="bi bi-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </section>
       
    </main><!-- End #main -->

    <?php include('layout/footer.php')?>

    <?php include('layout/script.php')?>

</body>

</html>