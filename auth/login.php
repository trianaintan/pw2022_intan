<?php
session_start();

if (isset($_SESSION["ssLoginPOS"])) {
    header("Location:../index.php");
    exit();
}

require_once "../config.php";
require_once "../module/mode-user.php";

// Jika tombol login ditekan
if (isset($_POST["login"])) {
    $username = htmlspecialchars($_POST["Username"]);
    $password = htmlspecialchars($_POST["password"]);

    $queryLogin = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    if ($queryLogin) {
        $row = mysqli_fetch_assoc($queryLogin);
        if ($row && password_verify($password, $row['password'])) {
            
            // Set session
            $_SESSION["ssLoginPOS"] = true;
            $_SESSION["ssUserPOS"] = $username;

            // Set level sesuai dengan data user
            $_SESSION["ssLevelPOS"] = $row['level'];

            header("location: ../index.php");
            exit();
        } else {
            echo "<script>
                alert('Password dan username salah..');
                document.location.href= 'login.php';
            </script>";
        }
    } else {
        echo "<script>
             alert('Username tidak terdaftar..');
             document.location.href= 'login.php';
         </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Universitas Primagraha</title>
    <link href="<?= $main_url ?>asset/sb-admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="<?= $main_url ?>asset/image/lambang upg.png">

    <style>
    body {
        background-image: url('../asset/image/ut.gif');
        background-size: cover;
        background-position: center center;
    }
    </style>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mt-4 ">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h4 class="text-center font-weight-light my-4">Login - Universitas Primagraha</h4>
                                </div>
                                <div class="card-body">
                                    <form action="login.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="Username" name="Username" type="text"
                                                placeholder="username" autocomplete="off" required />
                                            <label for="username">Username</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" minlength="4" name="password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <button type="submit" name="login"
                                            class="btn btn-primary col-12 rounded-pill my-2">Login</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="text-muted small">Copyright &copy; Universitas Primagraha
                                        <?= date("Y") ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= $main_url ?>asset/sb-admin/js/scripts.js"></script>
</body>

</html>