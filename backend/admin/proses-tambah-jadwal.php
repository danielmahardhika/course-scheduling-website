<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body></body>
</html>

<?php
    include "be-admin.php";

    $pk = new Admin();

    $a = $_POST["txtJadwal"];
    $b = $_POST["txtTanggal"];
    $c = $_POST["txtWaktu"];

    $status = $pk->tambahJadwal($a, $b, $c);
    if ($status == true) {
        echo"<script>
            Swal.fire({
                    title: 'Berhasil!',
                    text: 'Jadwal telah ditambahkan',
                    icon: 'success',
                    confirmButtonColor: '#000000'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../frontend/admin/view-kelola-jadwal.php';
                }
            });
        </script>";
        //header("Location:../../frontend/admin/view-kelola-jadwal.php");
    } else {
        echo "Gagal Menambahkan Data.";
    }
?>