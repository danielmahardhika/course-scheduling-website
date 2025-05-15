<?php
// PHP logic 
?>

<html lang="en">

<head>
    <title>ProRider</title>

    <!-- Menambahkan Favicon -->
    <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
    
    <!--TODO: function java script untuk mengarahkan ke halaman login atau sign up user -->
    <script>
        function adminPage() {
            window.location.href = "../../frontend/user/view-login-user.php";
        }

        function userPage() {
            window.location.href = "../../frontend/user/view-signup-user.php";
        }

        function signUpPage() {
            window.location.href = "../../frontend/user/view-signup-user.php"
        }

        function gabungKursus() {
            window.location.href = "../../frontend/user/view-create-user.php";
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
                <img src="../../assets/logo-prorider.png" alt="Logo" class="h-12">
            </div>

            <!-- Menu -->
            <div class="md:flex items-center space-x-6">
                <a href="../../index.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">Home</a>
                <a href="about-us.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">About</a>
                <a href="#" onclick="window.open('https://wa.me/6287724061150?text=Hi, saya ingin menghubungi Anda!', '_blank')" class="text-gray-700 font-medium hover:text-[#89A8B2]">Contact Us</a>
                <!-- Button Login -->
                <button class="flex items-center border-2 border-black bg-white text-black font-medium rounded-lg px-4 py-2 hover:bg-[#E3E7EA] transition duration-300" onclick="adminPage()">
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
    <section class="bg-[url('../../assets/belajar-mobil2.jpg')] bg-cover bg-[center_top] bg-no-repeat mt-1/2">
      <div class="bg-black/60 p-8 md:p-12 lg:px-16 lg:py-24 flex items-center justify-center">
        <div class="flex items-center justify-center text-white flex-col">
          <h2 class="text-2xl font-bold text-white sm:text-3xl md:text-5xl">JOIN US!</h2>
          <p class="hidden max-w-lg text-white/90 md:mt-6 md:block md:text-lg md:leading-relaxed text-center">
              ProRider memiliki pengajar yang tidak perlu ditanyakan, dalam 3 bulan anda akan mendapatkan SIM tanpa menembak
          </p>
          <button onclick="gabungKursus()" class="flex items-center bg-[#E5E1DA] text-black font-medium rounded-lg px-4 py-2 hover:bg-[#3E4143] hover:text-[#D8D2C2] transition duration-300 mt-8">
              Gabung Kursus
          </button>
        </div>
      </div>
    </section>
    <!-- End of Banner -->

    <!-- SERVICE CARDS -->
<!-- Deskripsi Kursus Mobil -->
    <!-- Deskripsi Kursus Mobil -->
<div class="max-w-screen-xl mx-auto px-4 py-8 text-center">
    <h3 class="text-2xl font-bold text-gray-800">Kursus Mobil ProRider</h3>
    <p class="mt-4 text-gray-600 text-lg leading-relaxed">
        Di ProRider, kami menawarkan kursus mobil yang dirancang khusus untuk semua level pengemudi. 
        Dengan instruktur yang berpengalaman dan metode pengajaran yang teruji, 
        Anda akan belajar cara mengemudikan mobil dengan aman dan percaya diri. 
        Kursus kami mencakup pelatihan teori dan praktik, serta persiapan untuk ujian SIM. 
        Kami memahami bahwa setiap siswa memiliki kebutuhan unik, oleh karena itu kami menawarkan 
        pendekatan pembelajaran yang disesuaikan dengan kemampuan dan tujuan Anda.
    </p>
    <p class="mt-4 text-gray-600 text-lg leading-relaxed">
        Selama kursus, Anda akan mendapatkan pemahaman mendalam tentang aturan lalu lintas, 
        teknik mengemudi yang aman, dan cara menangani situasi darurat di jalan. 
        Instruktur kami tidak hanya mengajarkan keterampilan mengemudi, tetapi juga membangun 
        kepercayaan diri Anda sebagai pengemudi. 
        Kami percaya bahwa pengalaman belajar yang positif akan membentuk pengemudi yang bertanggung jawab.
    </p>
    <p class="mt-4 text-gray-600 text-lg leading-relaxed">
        Dengan fleksibilitas jadwal dan sesi latihan yang dapat diatur, 
        Anda dapat belajar mengemudi tanpa mengganggu aktivitas sehari-hari Anda. 
        Bergabunglah dengan kami dan raih SIM Anda dalam waktu singkat, 
        sambil menikmati proses belajar yang menyenangkan dan bermanfaat. 
        Daftar sekarang dan mulailah perjalanan Anda menuju menjadi pengemudi yang handal!
    </p>
</div>
<!-- End of Deskripsi Kursus Mobil -->
<!-- End of Deskripsi Kursus Mobil -->
    <!-- End of SERVICE CARDS -->

    <!-- FOOTER -->
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
    <!-- End of FOOTER -->
</body>

</html>