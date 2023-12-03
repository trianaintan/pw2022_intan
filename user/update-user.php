<?php
session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
    header("location: ../auth/login.php");
    exit();
}


require_once "../config.php";
require_once "../module/mode-user.php";
$title = "Update Mahasiswa - Universitas Primagraha";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$username = $_GET['username'];
$user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
$data = mysqli_fetch_array($user);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $username = htmlspecialchars($_POST["username"]);
    $fullname = htmlspecialchars($_POST["fullname"]);
    $level = htmlspecialchars($_POST["level"]);
    $address = htmlspecialchars($_POST["address"]);

    $stmt = mysqli_prepare($koneksi, "UPDATE user SET fullname = ?, level = ?, address = ? WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "ssss", $fullname, $level, $address, $username);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data berhasil diupdate');
                window.location.href ='user.php';
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
            <h1 class="mt-4">Update Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="user.php">Users</a></li>
                <li class="breadcrumb-item active">Update Users</li>
            </ol>
            <form action="update-user.php?nim=<?= $username ?>" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i>Update Users</span>
                        <button type="submit" name="update" class="btn btn-primary float-end">
                            <i class="fa-solid fa-floppy-disk"></i> Update
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <input type="text" name="username" readonly class="form-control" id="username"
                                        value="<?= $username ?>">
                                </div>

                                <div class="mb-3 row">
                                    <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                                    <input type="text" name="fullname" required class="form-control" id="fullname"
                                        value="<?= isset($data['fullname']) ? $data['fullname'] : ''; ?>">
                                </div>

                                <div class="mb-3 row">
                                    <label for="level">Level</label>
                                    <select name="level" id="level" class="form-control" required
                                        value="<?= isset($data['level']) ? $data['level'] : ''; ?>">
                                        <option value="">--Level User--</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Dosen</option>
                                        <option value="3">Mahasiswa</option>
                                    </select>
                                </div>

                                <div class="mb-3 row">
                                    <label for="address" class="col-sm-2 col-form-label">address</label>
                                    <input type="text" name="address" required class="form-control" id="address"
                                        value="<?= isset($data['address']) ? $data['address'] : ''; ?>">
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
require_once "../template/footer.php";
?>