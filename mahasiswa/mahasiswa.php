<?php
session_start();

// if (!isset($_SESSION["ssLogin"])) {
//   header("location:../auth/login.php");
//   exit();
// }

require_once "../config.php";
$title = "Mahasiswa - Universitas Primagraha";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// Ambil data mahasiswa dari database
$queryMahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");



?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Mahasiswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i>Data Mahasiswa</span>
                    <a href="<?= $main_url ?>mahasiswa/add-mahasiswa.php" class="btn btn-sm btn-primary float-end"><i
                            class="fa-solid fa-plus"></i>Tambah Mahasiswa</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatableSimple">
                        <thead>
                            <tr>
                                <th scope="col">N0</th>
                                <th scope="col">
                                    <center>NIM</center>
                                </th>
                                <th scope="col">
                                    <center>Nama Mahasiswa</center>
                                </th>
                                <th scope="col">
                                    <center>Alamat</center>
                                </th>
                                <th scope="col">
                                    <center>N0 Telephone</center>
                                </th>
                                <th scope="col">
                                    <center>Operasi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $no = 1;
                       
                        $queryMahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                        while ($data = mysqli_fetch_array($queryMahasiswa)) {?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $data['nim'] ?></td>
                                <td><?= $data['nm_mahasiswa'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['no_telfon'] ?></td>
                                <td align="center">
                                    <a href="update-mahasiswa.php?nim=<?= $data['nim']?>" class="btn btn-sm btn-warning"
                                        title="Update Mahasiswa"
                                        onclick="return confirm('Anda yakin akan mengubah data ini ?')"><i
                                            class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-mahasiswa.php?nim=<?= $data['nim']?>" class="btn btn-sm btn-danger"
                                        title="Hapus Mahasiswa"
                                        onclick="return confirm('Anda yakin akan menghapus data ini ?')"><i
                                            class=" fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once "../template/footer.php";
    ?>