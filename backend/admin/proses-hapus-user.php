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

    $id = $_GET["idUser"];

    $status = $pk->hapusUser($id);

    if($status==true)
    echo"<script>
        Swal.fire({
                title: 'Berhasil!',
                text: 'User telah dihapus',
                icon: 'success',
                confirmButtonColor: '#000000'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../../frontend/admin/view-kelola-user.php';
            }
        });
    </script>";
    else 
        echo "Gagal Menghapus Data.";
?>