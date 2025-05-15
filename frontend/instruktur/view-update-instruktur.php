<?php
include "../../backend/instruktur/kelas-instruktur.php";
session_start();

if (!isset($_SESSION["instruktur_logged_in"]) || $_SESSION["instruktur_logged_in"] == false) {
    header("Location: view-login-instruktur.php");
}

//Mengambil nama user yang login 
$namaInstruktur = $_SESSION["instruktur_name"];

$ready = new Instruktur();

//call method
$jadwalKursus = $ready->readJadwalKursus();

?>

<html>

<head>
    <title>Instruktur Kursus</title>
    <!-- Menambahkan Favicon -->
    <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function logOutPage() {
            window.location.href = "logout-instruktur.php";
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
                <a href="view-update-instruktur.php" class="text-black font-medium hover:text-[#89A8B2]">Verifikasi Kursus</a>
                <!-- Button Login -->
                <button onclick="logOutPage()" class="flex items-center border-2 border-black bg-white text-black font-medium rounded-lg px-4 py-2 hover:bg-[#E3E7EA] transition duration-300">
                    Log out
                </button>

                <!-- TODO: Ambil nama dari user yang login -->
                <p class="font-bold">Welcome, <?php echo htmlspecialchars($namaInstruktur); ?>!</p>
            </div>
        </div>
    </nav>
    <!-- End of Header -->

    <!-- Main Content -->
    <div class="flex flex-col items-center">
        <h2 class="text-2xl font-semibold mb-4">Jadwal Kursus</h2>
        <div class="overflow-x-auto w-full max-w-screen-lg">
            <div class="max-h-96 overflow-y-auto relative"> <!-- Pembungkus untuk scroll -->
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-black text-white sticky top-0"> <!-- Sticky header -->
                        <tr class="text-center">
                            <th class="py-2 px-4 border-b">ID JADWAL KURSUS</th>
                            <th class="py-2 px-4 border-b">ID USER</th>
                            <th class="py-2 px-4 border-b">NAMA KURSUS</th>
                            <th class="py-2 px-4 border-b">NAMA USER</th>
                            <th class="py-2 px-4 border-b">ID JADWAL</th>
                            <th class="py-2 px-4 border-b">TANGGAL</th>
                            <th class="py-2 px-4 border-b">WAKTU</th>
                            <th class="py-2 px-4 border-b">STATUS</th>
                            <th class="py-2 px-4 border-b">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($jadwalKursus)) {
                            // Jika tidak ada data
                            echo "<tr><td colspan='9' class='py-2 px-4 text-center border-b'>Tidak ada data</td></tr>";
                        } else {
                            //unboxing array
                            foreach ($jadwalKursus as $jadwal) {
                                echo "<tr class='hover:bg-gray-100 text-center'>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idJadwalKursus"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idUser"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["namaKursus"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["namaUser"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["idJadwal"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["tanggal"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["waktu"]) . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($jadwal["status"]) . "</td>";

                                // Action
                                echo "<td class='py-2 px-4 border-b text-center'>"; // Tambahkan text-center untuk penataan
                                echo "<div class='flex justify-center space-x-4'>"; // Membuat container flex untuk menata elemen
                                echo "<a href='../../backend/instruktur/proses-update-instruktur.php?idJadwalKursus=" . urlencode($jadwal["idJadwalKursus"]) . "' class='text-blue-500 hover:underline'>
                                        Verifikasi
                                    </a>";
                                echo "<a href='../../backend/instruktur/proses-delete-instruktur.php?idJadwalKursus=" . urlencode($jadwal["idJadwalKursus"]) . "' class='text-red-500 hover:underline'>
                                        Delete
                                    </a>";
                                echo "</div>"; // Tutup div flex
                                echo "</td>";

                                // Action
                                // echo "<td class='py-2 px-4 border-b'>";
                                // echo "<a href='../../backend/instruktur/proses-delete-instruktur.php?idJadwalKursus=" . urlencode($jadwal["idJadwalKursus"]) . "' class='text-red-500 hover:underline'>
                                // Unverifikasi
                                // </a>";
                                // echo "</td>";

                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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