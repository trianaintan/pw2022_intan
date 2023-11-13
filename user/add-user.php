<?php
/** manggil tiap direktori, dikasih ../ buat manggil direktori yang gak satu tempat, karna yang lain kan ada di folder yang beda kan */

require_once "../config.php";
$title = "Tambah User - Universitas Primagraha";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Tambah User</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i>Tambah User</span>
                    <button type="submit" name="simpan" class="btn btn-primary float-end"><i
                            class="fa-solid fa-floppy-disk"></i>Simpan</button>
                    <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i
                            class="fa-solid fa-xmark"></i>Simpan</button>
                </div>
                <div class="card-body">
                    <div> class="row">

                    </div>
                </div>
            </div>

        </div>
    </main>

    <?php
/**ini buat ubah tulisan paling atas pas user didashbor di klik */

require_once "../template/footer.php";  

    ?>