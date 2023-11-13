<?php
session_start();
require_once "../config.php";

if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nm_mahasiswa = htmlspecialchars($_POST['nm_mahasiswa']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telfon = $_POST['no_telfon'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO mahasiswa VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $nim, $nm_mahasiswa, $alamat, $no_telfon);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data berhasil disimpan');
                document.location.href ='mahasiswa.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal disimpan');
            </script>";
    }

    mysqli_stmt_close($stmt);
    return;
} else if (isset($_POST['update'])) {
    $nim = $_POST["nim"];
    $nm_mahasiswa = $_POST["nm_mahasiswa"];
    $alamat = $_POST["alamat"];
    $no_telfon = $_POST["no_telfon"];
    // Handle update as shown in the update-mahasiswa.php file
    // ...
    // Ensure that you are using prepared statements for security
    // ...
}
?>