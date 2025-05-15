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
    //$b = $_POST["txtNama"];
    $b = $_POST["txtPassword"];

    // Memanggil method
    $status = $pk->ubahUser($a, $b);
    if ($status) {
        echo"<script>
            Swal.fire({
                    title: 'Berhasil!',
                    text: 'User telah diubah',
                    icon: 'success',
                    confirmButtonColor: '#000000'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../frontend/admin/view-kelola-user.php';
                }
            });
        </script>";
    } else {
        echo "Gagal Mengubah Data.";
    }
?>