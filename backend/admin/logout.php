<?php
    session_start(); // Mulai sesi

    // Hapus semua data sesi
    session_unset();
    session_destroy();

    // Arahkan kembali ke halaman login
    header("Location: ../../frontend/admin/view-login.php");
    exit();
?>
