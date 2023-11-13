<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <a class="nav-link" href="<?= $main_url ?>user/add-user.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        User
                    </a>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                        GantiPassword
                    </a>
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">Data</div>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                        Dosen
                    </a>
                    <a class="nav-link" href="<?= $main_url ?>mahasiswa/mahasiswa.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                        Mahasiswa
                    </a>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                        Mata Pelajaran
                    </a>
                    <hr class="mb-0">

                </div>
            </div>
            <div class="sb-sidenav-footer border">
                <div class="small">Logged in as:</div>
                <?= "Admin" ?>
            </div>
        </nav>
    </div>