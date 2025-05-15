<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body></body>
</html>

<?php
include "kelas-instruktur.php";

//instance
$delete = new Instruktur();

//unboxing-set parameter
// $status = $_GET["status"];
$idJadwalKursus = $_GET["idJadwalKursus"];

// Call method
$statusMethod = $delete->delete($idJadwalKursus);

if ($statusMethod == true) {
    echo"<script>
            Swal.fire({
                    title: 'Berhasil!',
                    text: 'Penghapusan telah dilakukan',
                    icon: 'success',
                    confirmButtonColor: '#000000'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../frontend/instruktur/view-update-instruktur.php';
                }
            });
        </script>";
} else {
    echo "<script>alert('Jadwal Kursus gagal di Aktifkan!');</script>";
}
