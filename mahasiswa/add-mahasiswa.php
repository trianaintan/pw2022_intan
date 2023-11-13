<?php
session_start();

//if (!isset($_SESSION["ssLogin"])) {
   // header("location:../auth/login.php");
   // exit();
//}

require_once "../config.php";
$title = "Mahasiswa - Universitas Primagraha";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// Langkah 1: Ambil data nim dari tabel mahasiswa
$queryNIM = mysqli_query($koneksi,  "SELECT nim FROM mahasiswa ORDER BY nim DESC LIMIT 1");
$data = mysqli_fetch_array($queryNIM);
$nimTerakhir = $data["nim"];
$nimBaru =$nimTerakhir ;

$noUrut = (int) substr($nimBaru, 2, 4);
$noUrut++;
$nimBaru = "22" . sprintf("%04s", $noUrut);

// Langkah 2: Ambil data lainnya dari form jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["simpan"])) {
    // Langkah 3: Validasi input
    $nim = $_POST["nim"] ;
    $nm_mahasiswa = $_POST["nm_mahasiswa"] ;
    $alamat = $_POST["alamat"] ;
    $no_telfon = $_POST["no_telfon"] ;

    $cek_nim = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'");

    if (mysqli_num_rows($cek_nim) > 0) {

    }else {
        $query = "INSERT INTO mahasiswa (nim, nm_mahasiswa, alamat, no_telfon) VALUES ('$nim', '$nm_mahasiswa', '$alamat', '$no_telfon')";

        if (mysqli_query($koneksi, $query)) {
            echo"Data berhasil ditambahkan";

        }else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }
    
   mysqli_close($koneksi);
}
?>







<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Mahasiswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item "><a href="mahasiswa.php">Mahasiswa</a></li>
                <li class="breadcrumb-item active">Tambah Mahasiswa</li>
            </ol>
            <form action="proses-mahasiswa.php" method="post" enctype="multipart/form-data">
                <!-- Formulir Anda di sini -->


                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-plus"></i>Tambah Mahasiswa</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i
                                class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i
                                class="fa-solid fa-xmark"></i>
                            Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">

                                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                    <label for="nim" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="number" name="nim" readonly
                                            class="form-control-plaintext border-bottom ps-2" id="nim"
                                            value="<?= $nimBaru ?>">
                                    </div>
                                </div>

                                <div class="mb-3 row">

                                    <label for="nm_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                    <label for="nim" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="nm_mahasiswa" required
                                            class="form-control border-0 border-bottom ps-2 " id="nm_mahasiswa">
                                    </div>
                                </div>

                                <div class="mb-3 row">

                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="nim" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="alamat" required
                                            class="form-control border-0 border-bottom ps-2 " id="alamat">
                                    </div>
                                </div>

                                <div class="mb-3 row">

                                    <label for="no_telfon" class="col-sm-2 col-form-label">Nomor Telephone</label>
                                    <label for="nim" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="no_telfon" required
                                            class="form-control border-0 border-bottom ps-2 " id="no_telfon">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </main>


    <?php

require_once "../template/footer.php";
?>