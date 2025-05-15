<?php
include "kelas-user.php";

// instance
$create = new User();

// unboxing - set parameter

$idUser = $_GET["idUser"];
$namaKursus = $_GET["namaKursus"];
$namaUser = $_GET["namaUser"];
$idJadwal = $_GET["idJadwal"];
$tanggal = $_GET["tanggal"];
$waktu = $_GET["waktu"];
$status = $_GET["status"];

//call method
$statusMethod = $create->pesanKursus($idUser, $namaKursus, $namaUser, $idJadwal, $tanggal, $waktu, $status);

if ($statusMethod == true) {
    echo "<script>alert('Berhasil di Request!');
                window.location.href = '../../frontend/user/view-create-user.php';
            </script>";
} else {
    echo "<script>alert('Jadwal Kursus gagal di Request!');</script>";
}