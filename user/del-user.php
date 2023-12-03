<?php
session_start();

if (!isset($_SESSION["ssLoginPOS"])) {
    header("location: ../auth/login.php");
    exit();
}
require_once "../config.php";
require_once "../module/mode-user.php";

$username = $_GET['username'];

if (delete($username)) {
    echo "
            <script>
                alert('User berhasil dihapus..');
                document.location.href = 'user.php';
            </script>";
} else {
    echo "
            <script>
                alert('User gagal dihapus..');
                document.location.href = 'user.php';
            </script>";
}


?>