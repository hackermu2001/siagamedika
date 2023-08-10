<?php
session_start();

$current_page = 'brand';

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
    <title>Siagamedika - Brand</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Brand</h1>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#AddBrand"><i class="fas fa-plus fa-sm text-white-50"></i> Brand</button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="AddBrand" tabindex="-1" aria-labelledby="AddBrandLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddBrandLabel">Add Brand</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="php/function_php/brand_insert.php" name="add_brand" id="add_brand" method="post" class="form-row modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered brand_input">
                                    <tr>
                                        <th>Nama</th>
                                        <th width="10" >Action</th>
                                    </tr>
                                    <tr id="row_input">
                                        <td><input type="text" name="txtNamaBrand[]" class="border-0 w-100 bg-transparent p-0 m-0" style="color: grey; box-sizing: border-box;" placeholder="Isi Nama Brand..."></td>
                                        <td><button class="btn btn-circle btn-sm btn-primary mx-2" id="add-row" type="button"><i class="fas fa-plus"></i></button></td>
                                    </tr>
                                </table>    
                            </div>
                            <input type="button" name="submit_brand" id="submit_brand" type="submit" class="btn btn-primary btn-block my-2" value="Save Changes">
                        </form>
                        </div>
                    </div>
                    </div>

                    <!-- DataTales Brand -->
                    <?php
                    include '../koneksi.php';

                    $query = "SELECT SKU_BRND, NamaBrand, Tanggal FROM brand";
                    $result = mysqli_query($koneksi, $query);

                    $data = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Brand</h6>
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
                                                <td><?php echo $row['SKU_BRND']; ?></td>
                                                <td contenteditable="true" class="editable-cell" data-column="NamaBrand"><?php echo $row['NamaBrand']; ?></td>
                                                <td><?php echo $row['Tanggal']; ?></td>
                                                <td class="text-center align-middle">    
                                                    <button class="btn btn-primary btn-circle btn-sm edit-save-brand" data-sku="<?php echo $row['SKU_BRND']; ?>"><i class="fas fa-pen"></i></button>
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
    <script src="js/brand_ajax.js"></script>

</body>
</html>