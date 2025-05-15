<?php
    session_start();

    if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] == false) {
        header("Location: ../../frontend/admin/view-login.php");
    }
?>

<html>
    <head>
        <title>Ubah Jadwal</title>
        <!-- <link rel="stylesheet" href="view-edit-kursus.css"> -->
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

            /* Form Container */
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
            form input[type="date"],
            form input[type="time"],
            form select {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #E5E1DA;
                border-radius: 5px;
                font-size: 14px;
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

            form label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
                color: #1b1b1b;
            }

            .bg-white {
                position: absolute;
                display: flex;
                justify-content: flex-end;
                align-items: flex-end;  
                text-align: right;
                margin-top: 660px;        
                margin-bottom: 40px;
                margin-right: 40px;
                margin-left: 40px;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <?php
            include "../../backend/admin/be-admin.php";

            // Membuat objek
            $pk = new Admin();

            // Unboxing id dari link Ubah
            $id = $_GET["idUser"];
            
            // Memanggil method Select + Where
            $dtk = $pk->tampilkanUserByID($id);

            echo "<form method='post' action='../../backend/admin/proses-edit-user.php'>";
            
            foreach($dtk as $d) {
                echo "ID : " . $d["idUser"];
                echo "<input type='hidden' name='txtId' value='" . $d["idUser"] . "'>";
                echo "<br><br>";

                echo "Nama " . $d["nama"];
                echo "<input type='hidden' name='txtNama' value='" . $d["nama"] . "'>";
                echo "<br><br>";

                echo "Password ";
                echo "<input type='password' name='txtPassword' value='" . $d["password"] . "'>";
                echo "<br><br>";

                echo "<input type='submit' value='Simpan'>"; 
            }
            echo "</form>";
        ?>

        <!-- FOOTER -->
        <footer class="bg-white">
            <p class="mt-4 text-center text-sm text-black lg:mt-0 lg:text-right">
                Copyright &copy; 2024. All rights reserved.
            </p>
        </footer>
        <!-- End of FOOTER -->
    </body>
</html>