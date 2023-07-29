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
                    <h2>Blog</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Blog</li>
                        <li>Blog Title</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs Section -->
        <section class="blog-post">
            <div class="container">
                     <!-- Post content-->
                     <article>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img style="height: 423px; width: 100%;" class="img-fluid rounded" src="assets/img/departments-1.jpg" alt="..." /></figure>
                         <!-- Post header-->
                         <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on January 1, 2023 by Start Bootstrap</div>
                            <!-- Post categories-->
                            <a class="badge tag-teal text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge tag-teal text-decoration-none link-light" href="#!">Freebies</a>
                        </header>
                        <!-- Post content-->
                        <section class="mb-3 blog-content">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa, accusantium voluptate molestias ratione vero quos, atque deserunt ipsam, ut odio saepe. Voluptas consequatur exercitationem placeat provident voluptate neque deleniti tempora.</p>
                        </section>
                        <div class="share-list">
                            <span>Share:</span>
                            <ul class="social-list">
								<li><a class="facebook" href="#"><i class="bi-facebook"></i></a></li>
								<li><a class="twitter" href="#"><i class="bi-twitter"></i></a></li>
								<li><a class="dribble" href="#"><i class="bi-whatsapp"></i></a></li>
								<li><a class="google" href="#"><i class="bi-line"></i></a></li>
								<li><a class="pinterest" href="#"><i class="bi-link"></i></a></li>
							</ul>
                        </div>
                    </article>
            </div>
        </section>
       
    </main><!-- End #main -->

    <?php include('layout/footer.php')?>

    <?php include('layout/script.php')?>

</body>

</html>