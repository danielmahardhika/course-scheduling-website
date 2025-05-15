<?php
include "kelas-instruktur.php";
session_start();
$_SESSION["instruktur_logged_in"] = false;

//INSTANCE
$instruktur = new Instruktur();

//UNBOXING - SET PARAMETER
$namaProses = $_POST["nama"];
$passwordProses = $_POST["password"];

//CALL METHOD
$statusMethod = $instruktur->loginLogic($namaProses, $passwordProses);

if ($statusMethod === true) {
    // Ambil ID pengguna dari basis data
    $query = "SELECT idInstruktur FROM instruktur_profiles WHERE nama = :nama";
    $stmt = $instruktur->db->prepare($query);
    $stmt->bindParam(':nama', $namaProses);
    $stmt->execute();

    // Dapatkan ID pengguna
    $instrukturData = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($instrukturData) {
        // Simpan informasi instruktur di sesi
        $_SESSION["instruktur_logged_in"] = true;
        $_SESSION["instruktur_id"] = $instrukturData['idInstruktur']; // Simpan ID instruktur
        $_SESSION["instruktur_name"] = $namaProses;
        header("Location: ../../frontend/instruktur/view-update-instruktur.php");
        exit();
    } else {
        echo "<script>
        alert('Login Gagal. Pengguna tidak ditemukan.');
        window.location.href = '../../frontend/instruktur/view-login-instruktur.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Login Gagal. Silakan cek Nama atau Password Anda.');
    window.location.href = '../../frontend/instruktur/view-login-instruktur.php';
    </script>";
}
