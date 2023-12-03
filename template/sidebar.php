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
                    <?php if ($_SESSION["ssLevelPOS"] == 1 ) { ?>
                    <a class="nav-link" href="<?= $main_url ?>user/user.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        User
                    </a>
                    <?php } ?>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                        GantiPassword
                    </a>
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">Data</div>
                    <?php if ($_SESSION["ssLevelPOS"] == 1 || $_SESSION["ssLevelPOS"] == 2) { ?>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                        Dosen
                    </a>
                    <?php } ?>
                    <?php if ($_SESSION["ssLevelPOS"] == 1 || $_SESSION["ssLevelPOS"] == 3) { ?>
                    <a class="nav-link" href="<?= $main_url ?>mahasiswa/mahasiswa.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                        Mahasiswa
                    </a>
                    <?php } ?>
                    <?php if ($_SESSION["ssLevelPOS"] == 1 || $_SESSION["ssLevelPOS"] == 3 || $_SESSION["ssLevelPOS"] == 2) { ?>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                        Mata Pelajaran
                    </a>
                    <?php } ?>
                    <hr class="mb-0">

                </div>
            </div>
            <div class="sb-sidenav-footer border">
                <div class="small">Logged in as:</div>
                <?php echo isset($_SESSION['ssUserPOS']) ? ucfirst($_SESSION['ssUserPOS']) : 'Unknown User'; ?>
            </div>


        </nav>
    </div>