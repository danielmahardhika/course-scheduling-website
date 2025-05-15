<?php
    session_start();

    if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] == false) {
        header("Location: ../../frontend/admin/view-login.php");
    }
?>

<html>
    <head>
        <title>Tambah Jadwal</title>
        <!-- <link rel="stylesheet" href="view-tambah-kursus.css"> -->
        <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #F1F0E8;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                padding: 20px;
            }

            form {
                background-color: #FFFFFF;
                border: 2px solid #E5E1DA;
                border-radius: 10px;
                padding: 30px 40px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                text-align: left;
                width: 100%;
                max-width: 400px;
                font-size: 14px;
            }

            form input[type="password"],
            form input[type="text"],
            form select,
            form input[type="date"],
            form input[type="time"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #E5E1DA;
                border-radius: 5px;
                font-size: 14px;
            }

            form input[type="password"]:focus,
            form input[type="text"]:focus,
            form select:focus,
            form input[type="date"]:focus,
            form input[type="time"]:focus {
                border-color: #89A8B2;
                outline: none;
                box-shadow: 0 0 5px rgba(137, 168, 178, 0.5);
            }

            button {
                background-color: #000;
                color: #FFFFFF;
                border: none;
                padding: 12px 20px;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                width: 100%;
                margin-top: 20px;
            }

            button:hover {
                background-color: #3d3d3d;
            }

            form input[type="submit"] {
                background-color: #000;
                color: #FFFFFF;
                border: none;
                padding: 12px 20px;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                width: 100%;
                margin-top: 20px;
            }

            form input[type="submit"]:hover {
                background-color: #3d3d3d;
            }

            .bg-white {
                position: absolute;
                display: flex;
                justify-content: flex-end;
                align-items: flex-end;  
                text-align: right;
                margin-top: 680px;        
                margin-bottom: 40px;
                margin-right: 40px;
                margin-left: 40px;
                font-size: 14px;
            }
        </style>
        <script>
            function kelolaUser(){
                window.location.href = "view-kelola-user.php";
            }
        </script>
    </head>
    <body>
    <form method="post" action="../../backend/admin/proses-tambah-user.php">
        <label for="tanggal">Nama</label>
        <input type="text" name="txtNama" required><br><br>

        <label for="waktu">Password</label>
        <input type="password" name="txtPassword" required><br><br>

        <input type="submit" value="Simpan">
        <button onclick="kelolaUser()">Batal</button>
    </form>

        <!-- FOOTER -->
        <footer class="bg-white">
            <p class="mt-4 text-center text-sm text-black lg:mt-0 lg:text-right">
                Copyright &copy; 2024. All rights reserved.
            </p>
        </footer>
        <!-- End of FOOTER -->
    </body>
</html>