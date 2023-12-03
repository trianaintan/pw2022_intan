<?php

// Mulai sesi
session_start();

$_SESSION = [];

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Arahkan ke halaman login
header("location: login.php");
exit();