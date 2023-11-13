<?php
session_start();
require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
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
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
    // Logika untuk menyimpan data baru, jika diperlukan
}
?>