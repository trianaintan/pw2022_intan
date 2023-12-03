<?php
session_start();


if (!isset($_SESSION["ssLoginPOS"])) {
    header("location: ../auth/login.php");
    exit();
}

// if (!isset($_SESSION["ssLogin"])) {
//   header("location:../auth/login.php");
//   exit();
// }

require_once "../config.php";
require_once "../module/mode-user.php";
$title = "Mahasiswa - Universitas Primagraha";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// Ambil data mahasiswa dari database
$queryUser = mysqli_query($koneksi, "SELECT * FROM user");



?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i>Data Users</span>
                    <a href="<?= $main_url ?>user/add-user.php" class="btn btn-sm btn-primary float-end"><i
                            class="fa-solid fa-plus"></i>Tambah Users</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatableSimple">
                        <thead>
                            <tr>
                                <th scope="col">N0</th>
                                <th scope="col">
                                    <center>Username</center>
                                </th>
                                <th scope="col">
                                    <center>Fullname</center>
                                </th>
                                <th scope="col">
                                    <center>Level Users</center>
                                </th>
                                <th scope="col">
                                    <center>Address</center>
                                </th>
                                <th style="width: 10%;" scope="col">
                                    <center>Operasi</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $no = 1;
                       
                        $queryUser = mysqli_query($koneksi, "SELECT * FROM user");
                        while ($data = mysqli_fetch_array($queryUser)) {?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['fullname'] ?></td>
                                <td>
                                    <?php
                                    if ($data['level'] == 1) {
                                        echo "Admin";
                                    }else if ($data['level'] == 2) {
                                        echo "Dosen";
                                    } else {
                                        echo "mahasiswa";
                                    }
                                    ?>
                                </td>
                                <td><?= $data['address'] ?></td>
                                <td align="center">
                                    <a href="update-user.php?username=<?= $data['username']?>"
                                        class="btn btn-sm btn-warning" title="Update user"
                                        onclick="return confirm('Anda yakin akan mengubah data ini ?')"><i
                                            class="fa-solid fa-pen"></i></a>
                                    <a href="del-user.php?username=<?= $data['username']?>"
                                        class="btn btn-sm btn-danger" title="Hapus user"
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