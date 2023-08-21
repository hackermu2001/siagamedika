<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="img/favicon.png" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">SM Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($current_page == 'index') ? 'active' : ''; ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tools
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php echo ($current_page == 'product_add' || $current_page == 'product_edit' || $current_page == 'product_view') ? 'active' : ''; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Products</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php echo ($current_page == 'product_add') ? 'active' : ''; ?>" href="product_add.php">Add Products</a>
                        <a class="collapse-item <?php echo ($current_page == 'product_edit') ? 'active' : ''; ?>" href="product_edit.php">Edit Products</a>
                        <a href="product_view.php" class="collapse-item <?php echo ($current_page == 'product_view') ? 'active' : ''; ?>">View Products</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?php echo ($current_page == 'brand') ? 'active' : ''; ?>">
                <a class="nav-link " href="brand.php">
                    <i class="fas fa-fw fa-cookie"></i>
                    <span>Brand</span></a>
            </li>
            <li class="nav-item <?php echo ($current_page == 'kategori') ? 'active' : ''; ?>"">
                <a class="nav-link" href="kategori.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Category</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://imgur.com/">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Imgur</span></a>
            </li>

            <li class="nav-item <?php echo ($current_page == 'siagamedika') ? 'active' : ''; ?>">
                <a class="nav-link " href="website_siagamedika.php">
                    <i class="fas fa-fw fa-globe"></i>
                    <span>Siagamedika</span></a>
            </li>
           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           

        </ul>