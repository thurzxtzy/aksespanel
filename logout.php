<?php
// Inisialisasi sesi
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Hapus cookie sesi (jika ada)
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location: index.php");
exit;
?>