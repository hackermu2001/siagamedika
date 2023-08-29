<?php
session_start();

$current_page = 'seo';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('layout/head.php') ?>
    <meta name="description" content="">
    <meta name="author" content=""> 
    <title>Siagamedika - SEO</title>
    <?php include('layout/css.php')?>
    <?php include('../koneksi.php')?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('layout/side_nav.php') ?> 
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php include ('layout/nav.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Search Engine Optimization</h1>
                        <a href="seo_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add SEO</a>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Data SEO</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Focus Keyword</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SQL = "SELECT KodeSEO,page_url,PageTitle,Description,FokusKeyword,WaktuBuat,WaktuUpdate FROM seo";
                                        $DataSEO = mysqli_query($koneksi,$SQL);
                                        $No=1;
                                        foreach($DataSEO AS $s){ 
                                        ?>
                                        <tr>
                                        <td class="align-middle text-center"><?php echo $No++; ?></td>
                                        <td class="align-middle text-left text-wrap" style="width: 400px;">
                                            <ul class="list-unstyled">
                                                <li class="list-unstyled">
                                                    <b><?php echo $s['PageTitle']; ?></b>
                                                </li>
                                                <li class="list-unstyled">
                                                    <span class="badge badge-success"><?php echo $s['page_url']; ?></span>    
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="align-middle text-left text-wrap" width="300">
                                            <?php
                                            $description = $s['Description'];
                                            $maxCharacters = 100; // Jumlah maksimal karakter yang ingin Anda tampilkan

                                            if (strlen($description) > $maxCharacters) {
                                                $truncatedDescription = substr($description, 0, $maxCharacters) . "...";
                                                echo $truncatedDescription;
                                            } else {
                                                echo $description;
                                            }
                                            ?>
                                        </td> 
                                        <td class="align-middle text-left text-nowrap">
                                            <?php
                                            $keywords = explode(', ', $s['FokusKeyword']); // Pisahkan keyword menjadi array
                                            $numKeywords = count($keywords); // Hitung jumlah keyword

                                            echo '<span class="badge badge-pill badge-primary">' . $keywords[0] . '</span>';
                                            echo ' <span class="badge badge-pill badge-warning">+' . $numKeywords . '</span>';
                                            ?>
                                        </td>

                                        <td class="align-middle text-center"> 
                                            <a href="seo_edit.php?id=<?php echo $s['KodeSEO']; ?>" class="btn btn-primary btn-circle btn-sm edit-btn">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <button class="btn btn-danger btn-circle btn-sm delete-btn" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $s['KodeSEO']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                        </tr>
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
                                                aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Anda Yakin Menghapus Data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <a id="deleteLink" class="btn btn-danger" href="./php/function_php/seo_delete.php"><i class="fas fa-trash mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           <?php include('layout/footer.php')?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    
    <?php include('layout/script.php') ?>
    <script>
    $(document).ready(function () {
        $('.delete-btn').click(function () {
            var id = $(this).data('id');
            var deleteLink = './php/function_php/seo_delete.php?id=' + id;
            $('#deleteLink').attr('href', deleteLink);
        });
    });
    </script>
</body>
</html>