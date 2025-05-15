<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body></body>
</html>

<?php
    include "be-admin.php";

    //Membuat Objek
    $pk = new Admin();

    //Unboxing data + set parameter
    $a = $_POST["txtId"];
    $b = $_POST["txtJadwal"];
    $c = $_POST["txtTanggal"];
    $d = $_POST["txtWaktu"];

    // Memanggil method
    $status = $pk->ubahJadwal($a, $b, $c, $d);
    if ($status) {
        echo"<script>
            Swal.fire({
                    title: 'Berhasil!',
                    text: 'Jadwal telah diubah',
                    icon: 'success',
                    confirmButtonColor: '#000000'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../frontend/admin/view-kelola-jadwal.php';
                }
            });
        </script>";
    } else {
        echo "Gagal Mengubah Data.";
    }
?>