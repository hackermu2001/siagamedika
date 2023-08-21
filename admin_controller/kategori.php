<?php
session_start();

$current_page = 'kategori';

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
    <title>Siagamedika - Kategori</title>
    <?php include('layout/css.php')?>
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
                        <h1 class="h3 mb-0 text-gray-800">Category</h1>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#AddCategory"><i class="fas fa-plus fa-sm text-white-50"></i> Category</button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="AddCategory" tabindex="-1" aria-labelledby="AddCategoryLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddCategoryLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="php/function_php/kategori_insert.php" name="add_kategori" id="add_kategori" method="post" class="form-row modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered cat_input">
                                    <tr>
                                        <th>Nama</th>
                                        <th width="10" >Action</th>
                                    </tr>
                                    <tr id="row_input">
                                        <td><input type="text" name="txtNamaCat[]" class="border-0 w-100 bg-transparent p-0 m-0" style="color: grey; box-sizing: border-box;" placeholder="Isi Nama Kategori..."></td>
                                        <td><button class="btn btn-circle btn-sm btn-primary mx-2" id="add-row" type="button"><i class="fas fa-plus"></i></button></td>
                                    </tr>
                                </table>    
                            </div>
                            <input type="button" name="submit_kategori" id="submit_kategori" type="submit" class="btn btn-primary btn-block my-2" value="Save Changes">
                        </form>
                        </div>
                    </div>
                    </div>
                    

                    <!-- DataTales Brand -->
                    <?php
                    include '../koneksi.php';

                    $query = "SELECT NamaKategori, kode_kategori, Tanggal FROM kategori";
                    $result = mysqli_query($koneksi, $query);

                    $data = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
                            <button class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="location.reload();"><i class="fas fa-sync fa-sm text-white-50"></i> Refresh</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="brand_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SKU</th>
                                            <th>Nama</th>
                                            <th>Creation Date</th>
                                            <th width="10" >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $row): ?>
                                            <tr>
                                                <td><?php echo $row['kode_kategori']; ?></td>
                                                <td contenteditable="false" class="editable-cell" data-column="NamaKategori" data-original-value="<?php echo $row['NamaKategori']; ?>"><?php echo $row['NamaKategori']; ?></td>
                                                <td><?php echo $row['Tanggal']; ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary btn-circle btn-sm edit-save-cat" data-id_cat="<?php echo $row['kode_kategori']; ?>"><i class="fas fa-pen"></i></button>
                                                    <button class="btn btn-danger btn-circle btn-sm cancel-edit-cat" style="display: none;" data-id_cat="<?php echo $row['kode_kategori']; ?>"><i class="fas fa-times"></i></button>    
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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
    <script src="js/category_ajax.js"></script>
</body>
</html>