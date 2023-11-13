<?php
session_start();

require_once "../config.php";
$title = "Update Mahasiswa - Universitas Primagraha";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$nim = $_GET['nim'];
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
$data = mysqli_fetch_array($mahasiswa);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $nim = $_POST["nim"];
    $nm_mahasiswa = htmlspecialchars($_POST["nm_mahasiswa"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $no_telfon = $_POST["no_telfon"];

    $stmt = mysqli_prepare($koneksi, "UPDATE mahasiswa SET nm_mahasiswa = ?, alamat = ?, no_telfon = ? WHERE nim = ?");
    mysqli_stmt_bind_param($stmt, "ssss", $nm_mahasiswa, $alamat, $no_telfon, $nim);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data berhasil diupdate');
                window.location.href ='mahasiswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diupdate');
              </script>";
    }

    mysqli_stmt_close($stmt);
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Mahasiswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="mahasiswa.php">Mahasiswa</a></li>
                <li class="breadcrumb-item active">Update Mahasiswa</li>
            </ol>
            <form action="update-mahasiswa.php?nim=<?= $nim ?>" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i>Update Mahasiswa</span>
                        <button type="submit" name="update" class="btn btn-primary float-end">
                            <i class="fa-solid fa-floppy-disk"></i> Update
                        </button>
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
                                            value="<?= $nim ?>">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nm_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                    <label for="nm_mahasiswa" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="nm_mahasiswa" required
                                            class="form-control border-0 border-bottom ps-2 " id="nm_mahasiswa"
                                            value="<?= isset($data['nm_mahasiswa']) ? $data['nm_mahasiswa'] : ''; ?>">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="alamat" required
                                            class="form-control border-0 border-bottom ps-2 " id="alamat"
                                            value="<?= isset($data['alamat']) ? $data['alamat'] : ''; ?>">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="no_telfon" class="col-sm-2 col-form-label">Nomor Telephone</label>
                                    <label for="no_telfon" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="no_telfon" required
                                            class="form-control border-0 border-bottom ps-2 " id="no_telfon"
                                            value="<?= isset($data['no_telfon']) ? $data['no_telfon'] : ''; ?>">
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