<?php
include "../../backend/user/kelas-user.php";
session_start();

if (!isset($_SESSION["user_logged_in"]) || $_SESSION["user_logged_in"] == false) {
    header("Location: ../../frontend/user/view-login-user.php");
}

//Mengambil nama user yang login 
$namaUser = $_SESSION["user_name"];
$idUser = $_SESSION["user_id"];

$ready = new User();

//call method
$jadwalReadyMobil = $ready->jadwalReadyMobil();
$jadwalReadyMotor = $ready->jadwalReadyMotor();

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
                <a href="view-create-user.php" class="text-black font-medium hover:text-[#89A8B2]">Pesan Kursus</a>
                <a href="view-read-user.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">Lihat Jadwal</a>
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
                        <th class="py-2 px-4 border-b">ID JADWAL</th>
                        <th class="py-2 px-4 border-b">NAMA JADWAL</th>
                        <th class="py-2 px-4 border-b">TANGGAL</th>
                        <th class="py-2 px-4 border-b">WAKTU</th>
                        <th class="py-2 px-4 border-b">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Check if there are any entries in the jadwalReadyMotor array
                    if (empty($jadwalReadyMobil)) {
                        echo "<tr><td colspan='5' class='py-2 px-4 text-center border-b'>Belum ada jadwal tersedia</td></tr>";
                    } else {
                        foreach ($jadwalReadyMobil as $jadwal) {
                            echo "<tr class='hover:bg-gray-100 text-center'>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idJadwal"]) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["namaJadwal"]) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["tanggal"]) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["waktu"]) . "</td>";

                            // Action
                            echo "<td class='py-2 px-4 border-b'>";
                            echo "<a href='../../backend/user/proses-create-user.php?idJadwal=" . urlencode($jadwal["idJadwal"]) .
                                "&idUser=" . urlencode($_SESSION["user_id"]) .
                                "&namaKursus=" . urlencode($jadwal["namaJadwal"]) .
                                "&namaUser=" . urlencode($_SESSION["user_name"]) .
                                "&tanggal=" . urlencode($jadwal["tanggal"]) .
                                "&waktu=" . urlencode($jadwal["waktu"]) .
                                "&status=" . urlencode("request") . "' class='text-blue-500 hover:underline'>Tambah</a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h2 class="text-2xl font-semibold mb-4 mt-20">Jadwal Kursus Motor</h2>
        <div class="overflow-x-auto w-full max-w-screen-lg">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-black text-white text-center">
                        <th class="py-2 px-4 border-b">ID JADWAL</th>
                        <th class="py-2 px-4 border-b">NAMA JADWAL</th>
                        <th class="py-2 px-4 border-b">TANGGAL</th>
                        <th class="py-2 px-4 border-b">WAKTU</th>
                        <th class="py-2 px-4 border-b">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Check if there are any entries in the jadwalReadyMotor array
                    if (empty($jadwalReadyMotor)) {
                        echo "<tr><td colspan='5' class='py-2 px-4 text-center border-b'>Belum ada jadwal tersedia</td></tr>";
                    } else {
                        foreach ($jadwalReadyMotor as $jadwal) {
                            echo "<tr class='hover:bg-gray-100 text-center'>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idJadwal"]) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["namaJadwal"]) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["tanggal"]) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["waktu"]) . "</td>";

                            // Action
                            echo "<td class='py-2 px-4 border-b'>";
                            echo "<a href='../../backend/user/proses-create-user.php?idJadwal=" . urlencode($jadwal["idJadwal"]) .
                                "&idUser=" . urlencode($_SESSION["user_id"]) .
                                "&namaKursus=" . urlencode($jadwal["namaJadwal"]) .
                                "&namaUser=" . urlencode($_SESSION["user_name"]) .
                                "&tanggal=" . urlencode($jadwal["tanggal"]) .
                                "&waktu=" . urlencode($jadwal["waktu"]) .
                                "&status=" . urlencode("request") . "' class='text-blue-500 hover:underline'>Tambah</a>";
                            echo "</td>";

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