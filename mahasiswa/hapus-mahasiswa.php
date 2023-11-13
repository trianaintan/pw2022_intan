<?php

session_start();


require_once "../config.php";

if (isset($_GET['nim'])) {
    $nim_to_delete = $_GET['nim'];

    $query_delete = "DELETE FROM mahasiswa WHERE nim = '$nim_to_delete'";
    $result = mysqli_query($koneksi, $query_delete);

    if ($result) {
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href ='mahasiswa.php';
            </script>";
    } else {
        echo "Error: " . $query_delete . "<br>" . mysqli_error($koneksi);
    }
}





?>