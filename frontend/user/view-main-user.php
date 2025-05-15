<?php
session_start();

if (!isset($_SESSION["user_logged_in"]) || $_SESSION["user_logged_in"] == false) {
    header("Location: ../../frontend/user/view-login-user.php");
}

//Mengambil nama user yang login 
$namaUser = $_SESSION["user_name"];

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
                <a href="view-create-user.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">Pesan Kursus</a>
                <a href="view-read-user.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">Lihat Jadwal</a>
                <!-- Button Login -->
                <button onclick="logOutPage()" class="flex items-center border-2 border-black bg-white text-black font-medium rounded-lg px-4 py-2 hover:bg-[#E3E7EA] transition duration-300">
                    Log out
                </button>

                <!-- TODO: Ambil nama dari user yang login -->
                <p>Welcome, <?php echo htmlspecialchars($namaUser); ?>!</p>
            </div>
        </div>
    </nav>
    <!-- End of Header -->

    <!-- Main Content -->
    <p>Akan berisi Pilih, pesan, lihat kursus</p>
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