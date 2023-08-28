<?php
session_start();

$current_page = 'banner';

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
    <title>Siagamedika - Banner</title>
    <?php include('layout/css.php')?>
    <?php include '../koneksi.php';?>
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
                        <h1 class="h3 mb-0 text-gray-800">Banner</h1>
                        <a href="banner_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Banner</a>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Banner Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th width="10" >No.</th>
                                        <th>Judul</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th width="10">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SQL = "SELECT KodeBanner,Judul,GambarURL,TautanURL,TglMulai,TglAkhir FROM banner";
                                        $Banner = mysqli_query($koneksi,$SQL);
                                        $No = 1;
                                        foreach($Banner AS $b){
                                            $tglAkhir = strtotime($b['TglAkhir']);
                                            $tglSekarang = strtotime(date("Y-m-d"));
                                            
                                            // Jika tanggal akhir sudah terlewati, hapus baris dari database
                                            if ($tglAkhir < $tglSekarang) {
                                                $kodeBanner = $b['KodeBanner'];
                                                mysqli_query($koneksi, "DELETE FROM banner WHERE KodeBanner='$kodeBanner'");
                                                continue; // Langsung lanjut ke iterasi berikutnya
                                            }
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $No++  ?></td>
                                            <td class="align-middle">
                                                <div class="media">
                                                    <img src="<?php echo $b['GambarURL']?>" width="50" height="50" class="mr-3" alt="<?php echo $b['Judul']; ?>"> 
                                                    <div class="media-body">
                                                        <h6 class="mb-0"><?php echo $b['Judul']; ?></h6>
                                                        <span class="">
                                                            <a href="<?php echo $b['TautanURL']; ?>" class="badge badge-pill badge-primary" target="_blank">Klik Tautan Disini</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <?php echo date("d/m/Y", strtotime($b['TglMulai'])); ?>
                                            </td>
                                            <td class="align-middle">
                                                <?php echo date("d/m/Y", strtotime($b['TglAkhir'])); ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button class="btn btn-danger btn-circle btn-sm delete-btn" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $b['KodeBanner']; ?>">
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
                                                        <a id="deleteLink" class="btn btn-danger" href="./php/function_php/banner_delete.php"><i class="fas fa-trash mr-2"></i>Delete</a>
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
            var deleteLink = './php/function_php/banner_delete.php?id=' + id;
            $('#deleteLink').attr('href', deleteLink);
        });
    });
    </script>
</body>
</html>