<?php

session_start();


if (!isset($_SESSION["ssLoginPOS"])) {
    header("location: ../auth/login.php");
    exit();
}

require_once "../config.php";
require_once "../module/mode-user.php";
$title = "Mahasiswa - Universitas Primagraha";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";




// Langkah 2: Ambil data lainnya dari form jika form disubmit
if (isset($_POST["simpan"])) {
    if (insert($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil diregistrasi..');
                document.location.href = 'user.php';
            </script>";
    }
}
    
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item "><a href="user.php">User</a></li>
                <li class="breadcrumb-item active">Tambah User</li>
            </ol>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i>Tambah User</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i
                                class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i
                                class="fa-solid fa-xmark"></i> Reset</button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 mb-3 row">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username"
                                        placeholder="Masukkan Username" autofocus autocomplate="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Fullname</label>
                                    <input type="text" placeholder="Masukkan Nama Lengkap" id="fullname" name="fullname"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" pattern="[A-Za-z0-9]{3,}"
                                        title="Kombinasi Angka dan Huruf minimal 6 Karakter"
                                        placeholder="Masukkan Password" minlength="6" id="password" name="password"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input type="password" placeholder="Masukkan Kembali Password Anda" id="password2"
                                        name="password2" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" id="level" class="form-control" required>
                                        <option value="">--Level User--</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Dosen</option>
                                        <option value="3">Mahasiswa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="" rows="3" class="form-control"
                                        placeholder="Masukkan Alamat User" required></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>


<?php
/**ini buat ubah tulisan paling atas pas user didashbor di klik */

/**notes:
 * dari nomor 30
 * ini buat ubah tampilan kolom username di tambah user. 
 * "form-control border-0 border-bottom" INI BIAR KOLOM BUAT NGISI USERNAME YANG MUNCUL TUH CUMA GARIS BAWAHNY AJA
 * maxlength="20" INI BUAT PANJANG DARI TAMPILAN USERNAME NYA.
 * <div class="row">
                        <div class="col-8">
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-0 border-bottom" id="username"
                                        name="username" maxlength="20">
                              
 */

require_once "../template/footer.php";  

    ?>