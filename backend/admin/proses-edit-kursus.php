<?php
    include "be-admin.php";

    //Membuat Objek
    $pk = new Admin();

    //Unboxing data + set parameter
    $a = $_POST["txtId"];
    $b = $_POST["txtNama"];
    $c = $_POST["txtKursus"];
    $d = $_POST["txtTanggal"];
    $e = $_POST["txtWaktu"];

    //Memanggil method
    $status = $pk->ubahKursus($a, $b, $c, $d, $e);
    if($status==true)
        header("Location:../../frontend/admin/view-dashboard.php");
    else 
        echo "Gagal Mengubah Data.";
?>