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

    //Unboxing - set parameter
    $a = $_POST["txtNama"];
    $b = $_POST["txtPassword"];

    //Panggil function atau method
    $status = $pk->tambahUser($a, $b);
    if($status==true)
        echo"<script>
        Swal.fire({
                title: 'Berhasil!',
                text: 'User telah ditambahkan',
                icon: 'success',
                confirmButtonColor: '#000000'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../../frontend/admin/view-kelola-user.php';
            }
        });
        </script>";
    else 
        echo "Gagal Menambahkan Data.";
?>