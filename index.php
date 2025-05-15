<?php
// PHP logic 
?>

<html lang="en">

<head>
  <title>ProRider</title>

  <!-- Menambahkan Favicon -->
  <link rel="icon" href="assets/favicon-logo.png" type="image/png">

  <script>
    function userPage() {
            window.location.href = "frontend/user/view-create-user.php";
    }

    function userPage() {
        window.location.href = "frontend/user/view-create-user.php";
    }

    function signUpPage() {
      window.location.href = "frontend/user/view-signup-user.php";
    }

    function gabungKursus() {
      window.location.href = "frontend/user/view-create-user.php";
    }

    function learnMoreMobil() {
      window.location.href = "frontend/user/layanan-mobil.php";
    }

    function learnMoreMotor() {
      window.location.href = "frontend/user/layanan-motor.php";
    }
  </script>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F1F0E8]">

  <!-- Navbar -->
  <nav class="bg-white shadow-md py-2 sticky top-0">
    <div class="max-w-screen-xl mx-auto px-6 flex items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center">
        <img src="assets/logo-prorider.png" alt="Logo" class="h-12">
      </div>

      <!-- Menu -->
      <div class="md:flex items-center space-x-6">
        <a href="index.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">Home</a>
        <a href="frontend/user/about-us.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">About</a>
        <a href="#" onclick="window.open('https://wa.me/6287724061150?text=Hi, Saya ingin menghubungi Anda!', '_blank')" class="text-gray-700 font-medium hover:text-[#89A8B2]">Contact Us</a>

        <!-- Button Login -->
        <button onclick="userPage()" class="flex items-center border-2 border-black bg-white text-black font-medium rounded-lg px-4 py-2 hover:bg-[#E3E7EA] transition duration-300" onclick="adminPage()">
          Log in
        </button>
        <!-- Button Sign Up -->
        <button class="flex items-center bg-black text-white font-medium rounded-lg px-4 py-2 hover:bg-[#3E4143] transition duration-300" onclick="signUpPage()">
          Sign up
        </button>
      </div>
    </div>
  </nav>

  <!-- Banner content -->
  <section class="bg-[url('assets/belajar-mobil3.jpg')] bg-cover bg-center bg-no-repeat mt-1/2">
    <div class="bg-black/60 p-8 md:p-12 lg:px-16 lg:py-24 flex items-center justify-center">
      <div class="flex items-center justify-center text-white flex-col">
        <h2 class="text-2xl font-bold text-white sm:text-3xl md:text-5xl">WELCOME MY RIDER!</h2>
        <p class="hidden max-w-lg text-white/90 md:mt-6 md:block md:text-lg md:leading-relaxed text-center">
          ProRider menawarkan kursus mengemudi yang dirancang untuk mempersiapkan Anda menjadi pengemudi yang handal dan aman di jalan
        </p>
        <button onclick="gabungKursus()" class="flex items-center bg-[#E5E1DA] text-black font-medium rounded-lg px-4 py-2 hover:bg-[#3E4143] hover:text-[#D8D2C2] transition duration-300 mt-8">
          Gabung Kursus
        </button>
      </div>
    </div>
  </section>
  <!-- End of Banner -->

  <!-- Tulisan "Layanan yang Tersedia" -->
  <div class="flex items-center justify-center mt-2 my-4">
    <p class="text-2xl text-center font-bold">Layanan yang Tersedia</p>
  </div>
  <!-- End of tulisan "Layanan yang Tersedia" -->

  <!-- SERVICE CARDS -->
  <div class="flex items-center justify-center flex-row gap-4 mb-4">

    <!-- Card Mobil -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden w-64">
      <img src="assets/belajar-mobil.jpg" alt="Mobil" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800">Layanan Mobil</h3>
        <p class="text-gray-600 mt-2">
          Ikuti kursus dan pelajari cara mengemudi mobil bersama instruktur berpengalaman. Belajar teknik mengemudi yang aman dan profesional untuk perjalanan sehari-hari.
        </p>
        <button class="mt-4 bg-[#E5E1DA] text-black font-medium rounded-lg px-4 py-2 hover:bg-[#3E4143] hover:text-[#D8D2C2] transition duration-300" onclick="learnMoreMobil()">
          Learn More
        </button>
      </div>
    </div>
    <!-- End of Card Mobil -->

    <!-- Card Motor -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden w-64">
      <img src="assets/kursus-motor.jpeg" alt="Motor" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800">Layanan Motor</h3>
        <p class="text-gray-600 mt-2">Ikuti kursus dan pelajari cara mengemudi motor dengan aman, menguasai teknik belok, rem, dan manuver lainnya dengan pengajaran langsung dari instruktur berlisensi.</p>
        <button class="mt-4 bg-[#E5E1DA] text-black font-medium rounded-lg px-4 py-2 hover:bg-[#3E4143] hover:text-[#D8D2C2] transition duration-300" onclick="learnMoreMotor()">
          Learn More
        </button>
      </div>
    </div>
    <!-- End of Card Motor -->

  </div>
  <!-- End of Service Cards -->

  </div>
  <!-- End of SERVICE CARDS -->

  <!-- FOOTER -->
  <footer class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
      <div class="sm:flex sm:items-center sm:justify-between">
        <div class="flex justify-center text-teal-600 sm:justify-start">
          <img src="assets/logo-prorider.png" alt="Logo ProRider" class="h-12">
        </div>

        <p class="mt-4 text-center text-sm text-black lg:mt-0 lg:text-right">
          Copyright &copy; 2024. All rights reserved.
        </p>
      </div>
    </div>
  </footer>
  <!-- End of FOOTER -->
</body>

</html>