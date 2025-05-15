<?php
    session_start();

    if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] == false) {
        header("Location: ../../frontend/admin/view-login.php");
    }
?>

<html>

<head>
    <title>Dashboard Admin</title>
    <!-- <link rel="stylesheet" href="view-dashboard.css">  -->
    <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
    <style>
        body {
            display: flex;
            min-height: 100vh; 
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #F1F0E8;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #000;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: white;
        }

        .sidebar button {
            width: 100%;
            padding: 15px;
            border: none;
            background: none;
            color: white;
            font-size: 18px;
            text-align: left;
            cursor: pointer;
        }

        .sidebar button:hover {
            background-color: #3d3d3d;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            width: 100%;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: none;
            color: #1b1b1b;
            font-size: 20px;
        }

        .navbar button {
            padding: 10px 20px;
            font-size: 1rem;
            border: 2px solid #1b1b1b;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            background-color: #F1F0E8;
            color: black;
            font-weight: bold;
        }

        .navbar button:hover {
            border: 2px solid #000;
            background-color: #dedede;
            color: black;
            border-radius: 5px;
            font-weight: bold;
        }

        .table-container {
            margin-top: 30px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 15px;
            border: 1px solid #ddd; 
            background-color: #f9f9f9;
        }

        th {
            background-color: #000;
            color: #fff;
            font-weight: bold;
        }

        button, button a {
            padding: 10px 15px;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
            background-color: #000;
            color: white;
            border: none; 
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover, button a:hover {
            background-color: #3d3d3d;
            color: white;
            border-radius: 5px;
            border: none;
        }

        button a:hover {
            text-decoration: none; 
        }

        footer {
            display: flex;
            justify-content: center;
            align-items: center;  
            text-align: center;
            margin-top: 150px;
            font-size: 14px;
        }
        </style>
    <script>
        function logoutPage() {
            window.location.href = "../../backend/admin/logout.php";
        }
        function adminPage(kategori) {
            window.location.href = "../../frontend/admin/view-tampil-kursus.php?kategori=" + kategori;
        }
        function kembaliDashboard() {
            window.location.href = "view-dashboard.php";
        }
        function kelolaJadwal(){
            window.location.href = "view-kelola-jadwal.php";
        }
        function tambahUser(){
            window.location.href = "view-tambah-user.php";
        }
    </script>
</head>

<body>
    <div class="sidebar">
        <button onclick="adminPage('mobil')">Cek Kursus Mobil</button>
        <button onclick="adminPage('motor')">Cek Kursus Motor</button>
        <button onclick="kelolaJadwal()">Kelola Jadwal Tersedia</button>
        <button onclick="kembaliDashboard()">Dashboard Utama</button>
    </div>

    <div class="content">
        <div class="navbar">
            <span>Selamat Datang, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>!</span>
            <button onclick="logoutPage()">Log out</button>
        </div>

        <div class="table-container">
            <h1>Kelola Jadwal</h1>
            <?php
                include "../../backend/admin/be-admin.php";

                $pk = new Admin();
                $dtk = $pk->tampilkanUser();

                echo "<table>";
                echo "<tr> <th>ID USER</th> <th>NAMA</th> <th>PASSWORD</th> <th>AKSI</th></tr>";

                foreach ($dtk as $d) {
                    echo "<tr>";
                        echo "<td>" .$d["idUser"]. "</td>";
                        echo "<td>" .$d["nama"]. "</td>";
                        echo "<td>" .$d["password"]. "</td>";
                        echo "<td>";
                            echo "<button><a href='view-edit-user.php?idUser=".$d["idUser"]."'>Ubah Password</a></button>";
                            echo "  <button><a href='../../backend/admin/proses-hapus-user.php?idUser=".$d["idUser"]."'>Hapus User</a></button>";
                        echo "</td>";
                    echo "</tr>";
                }
                echo "</table><br>";
            ?>
            <button onclick="tambahUser()">Tambah User</button>
        </div>

        <!-- FOOTER -->
        <footer class="bg-white">
            <p class="mt-4 text-center text-sm text-black lg:mt-0 lg:text-right">
                Copyright &copy; 2024. All rights reserved.
            </p>
        </footer>
        <!-- End of FOOTER -->
    </div>
    
</body>

</html>
