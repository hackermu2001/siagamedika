<?php
if (isset($_COOKIE["remember_username"])) {
    $rememberedUsername = $_COOKIE["remember_username"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('layout/head.php') ?>
    <meta name="description" content="">
    <meta name="author" content=""> 
    <title>Siagamedika - Login</title>
    <?php include('layout/css.php')?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <?php
                                    // Display alert if provided by auth.php
                                    if (isset($_GET['invalid']) && $_GET['invalid'] === 'true') {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Invalid username or password.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="post" action="php/auth_php/auth.php" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="user_name" value="<?php echo isset($rememberedUsername) ? $rememberedUsername : ''; ?>" aria-describedby="text" placeholder="Enter Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                                <label class="custom-control-label" for="remember">Remember Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.php" class="btn btn-success btn-user btn-block">
                                            <i class="fab fa-whatsapp fa-fw"></i> IT Team
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p class="small"><span>Admin Panel SiagaMedika</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
    
    <?php include('layout/script.php') ?>
</body>
</html>