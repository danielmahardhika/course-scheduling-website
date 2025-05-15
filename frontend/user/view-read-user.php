<?php
include "../../backend/user/kelas-user.php";
session_start();

if (!isset($_SESSION["user_logged_in"]) || $_SESSION["user_logged_in"] == false) {
    header("Location: ../../frontend/user/view-login-user.php");
}

//Mengambil nama user yang login 
$namaUser = $_SESSION["user_name"];

$kursus = new User();

//call method
$tampilDataMobil = $kursus->tampilDataMobil($_SESSION["user_id"]);
$tampilDataMotor = $kursus->tampilDataMotor($_SESSION["user_id"]);

?>

<html>

<head>
    <title>Kursus</title>
    <!-- Menambahkan Favicon -->
    <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function logOutPage() {
            window.location.href = "../../backend/user/logout-user.php";
        }
    </script>
</head>

<body class="flex flex-col h-screen justify-between bg-[#F1F0E8]">
    <!-- Halaman user awal untuk melakukan Pemesanan -->

    <!-- Header -->
    <nav class="bg-white shadow-md py-2 sticky top-0">
        <div class="max-w-screen-xl mx-auto px-6 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="../../assets/logo-prorider.png" alt="Logo" class="h-12">
            </div>

            <!-- Menu -->
            <div class="md:flex items-center space-x-6">
                <a href="../../index.php" class="text-black font-medium hover:text-[#89A8B2]">Home</a>
                <a href="view-create-user.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">Pesan Kursus</a>
                <a href="view-read-user.php" class="text-black font-medium hover:text-[#89A8B2]">Lihat Jadwal</a>
                <!-- Button Login -->
                <button onclick="logOutPage()" class="flex items-center border-2 border-black bg-white text-black font-medium rounded-lg px-4 py-2 hover:bg-[#E3E7EA] transition duration-300">
                    Log out
                </button>

                <!-- TODO: Ambil nama dari user yang login -->
                <p class="font-bold">Welcome, <?php echo htmlspecialchars($namaUser); ?>!</p>
            </div>
        </div>
    </nav>
    <!-- End of Header -->

    <!-- Main Content -->
    <div class="flex flex-col items-center">
        <h2 class="text-2xl font-semibold mb-4">Jadwal Kursus Mobil</h2>
            <div class="overflow-x-auto w-full max-w-screen-lg">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-black text-white text-center">
                            <th class="py-2 px-4 border-b">ID JADWAL KURSUS</th>
                            <th class="py-2 px-4 border-b">ID USER</th>
                            <th class="py-2 px-4 border-b">NAMA KURSUS</th>
                            <th class="py-2 px-4 border-b">NAMA USER</th>
                            <th class="py-2 px-4 border-b">ID JADWAL</th>
                            <th class="py-2 px-4 border-b">TANGGAL</th>
                            <th class="py-2 px-4 border-b">WAKTU</th>
                            <th class="py-2 px-4 border-b">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($tampilDataMobil)) {
                            echo "<tr><td colspan='8' class='py-2 px-4 text-center border-b'>Belum ada data yang di input</td></tr>";
                        } else {
                            foreach ($tampilDataMobil as $jadwal) {
                                echo "<tr class='hover:bg-gray-100 text-center'>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idJadwalKursus"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idUser"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["namaKursus"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["namaUser"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idJadwal"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["tanggal"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["waktu"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["status"]) . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <h2 class="text-2xl font-semibold mb-4 mt-20">Jadwal Kursus Mobil</h2>
            <div class="overflow-x-auto w-full max-w-screen-lg">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-black text-white text-center">
                            <th class="py-2 px-4 border-b">ID JADWAL KURSUS</th>
                            <th class="py-2 px-4 border-b">ID USER</th>
                            <th class="py-2 px-4 border-b">NAMA KURSUS</th>
                            <th class="py-2 px-4 border-b">NAMA USER</th>
                            <th class="py-2 px-4 border-b">ID JADWAL</th>
                            <th class="py-2 px-4 border-b">TANGGAL</th>
                            <th class="py-2 px-4 border-b">WAKTU</th>
                            <th class="py-2 px-4 border-b">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($tampilDataMotor)) {
                            echo "<tr><td colspan='8' class='py-2 px-4 text-center border-b'>Belum ada data yang di input</td></tr>";
                        } else {
                            foreach ($tampilDataMotor as $jadwal) {
                                echo "<tr class='hover:bg-gray-100 text-center'>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idJadwalKursus"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idUser"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["namaKursus"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["namaUser"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idJadwal"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["tanggal"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["waktu"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["status"]) . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex justify-center text-teal-600 sm:justify-start">
                    <img src="../../assets/logo-prorider.png" alt="Logo ProRider" class="h-12">
                </div>

                <p class="mt-4 text-center text-sm text-black lg:mt-0 lg:text-right">
                    Copyright &copy; 2024. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</body>

</html>