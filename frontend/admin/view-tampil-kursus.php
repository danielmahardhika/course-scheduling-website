<?php
    session_start();

    if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] == false) {
        header("Location: ../../frontend/admin/view-login.php");
    }
?>

<html>
<head>
    <title>Data Kursus</title>
    <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
            background-color: #F1F0E8;
            justify-content: center;
            align-items: center;
        }

        .table-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin-bottom: 40px;
        }

        .header-container {
            display: flex;
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 20px; 
        }

        .header-container h1 {
            margin: 0; 
            font-size: 24px; 
        }

        .header-container button {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            background-color: #000;
            color: white;
        }

        .header-container button:hover {
            background-color: #3d3d3d;
            color: white;
            border-radius: 5px;
        }

        h1 {
            position: relative;
            margin-top: 10px;
            margin-bottom: 10px;
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
        }

        th {
            background-color: #000;
            color: #fff;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        .bg-white {
            position: absolute;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;  
            text-align: right;
            margin-top: 560px;        
            margin-bottom: 40px;
            margin-right: 40px;
            margin-left: 40px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <script>
        function tambahData() {
            window.location.href = "../../frontend/admin/view-tambah-kursus.php"
        }

        function kembali() {
            window.location.href = "../../frontend/admin/view-dashboard.php"
        }
    </script>

    <div class="table-container">
        <div class="header-container">
            <h1>Data Kursus</h1>
            <button onclick="kembali()">Kembali</button>
        </div>
        <?php
            include "../../backend/admin/be-admin.php";

            $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';  // Ambil kategori dari URL

            // Membuat objek Admin
            $pk = new Admin();

            // Menampilkan data berdasarkan kategori
            $dtk = $pk->tampilkanKursus($kategori);  // Memanggil method dengan kategori sebagai parameter

            // Membuat tabel untuk menampilkan data
                echo "<table border='1'>";
                echo "<tr> <th>ID JADWAL</th> <th>KURSUS</th> <th>NAMA</th> <th>TANGGAL</th> <th>WAKTU</th> </tr>";

                // Menampilkan data kursus
                if(empty($dtk)){
                    echo "<table><tr><td colspan='7'><h3>Belum ada data</h3></td></tr></table>";
                }else{
                foreach ($dtk as $d) {
                    echo "<tr>";
                        echo "<td>" . $d["idJadwalKursus"] . "</td>";
                        echo "<td>" . $d["namaKursus"] . "</td>";
                        echo "<td>" . $d["namaUser"] . "</td>";
                        echo "<td>" . $d["tanggal"] . "</td>";
                        echo "<td>" . $d["waktu"] . "</td>";
                    echo "</tr>";
                }
                echo "</table><br>";
            }
        ?>
    </div>
    <!-- FOOTER -->
    <footer class="bg-white">
        <p class="mt-4 text-center text-sm text-black lg:mt-0 lg:text-right">
            Copyright &copy; 2024. All rights reserved.
        </p>
    </footer>
    <!-- End of FOOTER -->
</body>
</html>
