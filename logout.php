<?php
session_start(); // Memulai sesi

// Menghancurkan semua data sesi
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

// Menghapus cookie sesi
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Redirect pengguna ke halaman login atau beranda
header('Location: login.php');
exit();
?>
