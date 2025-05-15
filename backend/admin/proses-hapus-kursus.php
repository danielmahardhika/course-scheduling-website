<?php
    include "be-admin.php";

    //Membuat Objek
    $pk = new Admin();

    $id = $_GET["idJadwal"];

    $status = $pk->hapusKursus($id);

    if($status==true)
        header("Location:../../frontend/admin/view-dashboard.php");
    else 
        echo "Gagal Menghapus Data.";
?>