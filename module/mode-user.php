<?php

function insert($data)
{
    global $koneksi;

    $username = strtolower(mysqli_real_escape_string($koneksi, $data['username']));
    $fullname = strtolower(mysqli_real_escape_string($koneksi, $data['fullname']));
    $password = strtolower(mysqli_real_escape_string($koneksi, $data['password']));
    $password2 = strtolower(mysqli_real_escape_string($koneksi, $data['password2']));
    $level = strtolower(mysqli_real_escape_string($koneksi, $data['level']));
    $address = strtolower(mysqli_real_escape_string($koneksi, $data['address']));

    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai, user baru gagal diregistrasi !');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $cekusername = mysqli_query($koneksi, "SELECT username FROM user WHERE username ='$username'");
    if (mysqli_num_rows($cekusername) > 0) {
        echo "<script>
                alert(' username sudah terpakai, user baru gagal diregistrasi !');
            </script>";
        return false;
    }

    $stmt = mysqli_prepare($koneksi, "INSERT INTO user (username, fullname, password, level, address) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $username, $fullname, $password, $level, $address);
    mysqli_stmt_execute($stmt);

    return mysqli_affected_rows($koneksi);
}

function delete($username)
{
    global $koneksi;

    $stmt = mysqli_prepare($koneksi, "DELETE FROM user WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        return true; // Berhasil menghapus
    } else {
        mysqli_stmt_close($stmt);
        return false; // Gagal menghapus
    }
}

function userLogin()
{
    $userActive = $_SESSION["ssUserPOS"];
    $dataUser = getData("SELECT * FROM user WHERE username = '$userActive'")[0];
    return $dataUser;
}

function getLevelName($level)
{
    switch ($level) {
        case 1:
            return "Admin";
        case 2:
            return "Dosen";
        case 3:
            return "Mahasiswa";
        default:
            return "Unknown";
    }
}



?>