<?php
    include "be-admin.php";
    session_start();
    $_SESSION["admin_logged_in"] = false;

    //INSTANCE
    $admin = new Admin();

    //UNBOXING - SET PARAMETER
    $namaProses = $_POST["nama"];
    $passwordProses = $_POST["password"];

    //CALL METHOD
    $status = $admin->loginLogic($namaProses, $passwordProses);

    if ($status == true) {
        $query = "SELECT idAdmin FROM admin_profiles WHERE nama = :nama";
        $stmt = $admin->db->prepare($query);
        $stmt->bindParam(':nama', $namaProses);
        $stmt->execute();
        
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        // Simpan informasi admin di sesi
        if ($userData){
            $_SESSION["admin_logged_in"] = true;
            $_SESSION["admin_id"] = $userData['idAdmin'];
            $_SESSION["admin_name"] = $namaProses;
            header("Location: ../../frontend/admin/view-dashboard.php");
        } else {
            echo "<script>
            alert('Login Gagal. Silakan cek ID, Nama, atau Password Anda.');
            window.location.href = '../../frontend/admin/view-login.php';
            </script>";
        } 
    }else {
        echo "<script>
        alert('Login Gagal. Silakan cek Nama atau Password Anda.');
        window.location.href = '../../frontend/admin/view-login.php';
        </script>";
    }
?>
