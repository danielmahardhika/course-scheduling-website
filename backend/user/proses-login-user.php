<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body></body>
</html>

<?php
include "kelas-user.php";
session_start();
$_SESSION["user_logged_in"] = false;

// INSTANCE
$user = new User();

// UNBOXING - SET PARAMETER
$namaProses = $_POST["nama"];
$passwordProses = $_POST["password"];

// CALL METHOD
$status = $user->loginLogic($namaProses, $passwordProses);

if ($status === true) {
    // Ambil ID pengguna dari basis data
    $query = "SELECT idUser FROM user_profiles WHERE nama = :nama";
    $stmt = $user->db->prepare($query);
    $stmt->bindParam(':nama', $namaProses);
    $stmt->execute();
    
    // Dapatkan ID pengguna
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($userData) {
        // Simpan informasi user di sesi
        $_SESSION["user_logged_in"] = true;
        $_SESSION["user_id"] = $userData['idUser']; // Simpan ID pengguna
        $_SESSION["user_name"] = $namaProses;
        echo"<script>
                Swal.fire({
                        title: 'Berhasil!',
                        text: 'Pendaftaran Berhasil!, Silahkan Login',
                        icon: 'success',
                        confirmButtonColor: '#000000'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../frontend/user/view-create-user.php';
                    }
                });
            </script>";
        //header("Location: ../../frontend/user/view-create-user.php");
        exit();
    } else {
        echo "<script>
        alert('Login Gagal. Pengguna tidak ditemukan.');
        window.location.href = '../../frontend/user/view-login-user.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Login Gagal. Silakan cek Nama atau Password Anda.');
    window.location.href = '../../frontend/user/view-login-user.php';
    </script>";
}