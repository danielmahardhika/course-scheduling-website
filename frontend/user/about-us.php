<!DOCTYPE html>
<html lang="en">

<head>
    <title>ProRider</title>
    <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
    <script>
        function adminPage() {
            window.location.href = "../../frontend/user/view-login-user.php";
        }

        function userPage() {
            window.location.href = "../../frontend/user/view-main-user.php";
        }

        function signUpPage() {
            window.location.href = "../../frontend/user/view-signup-user.php"
        }

        function learnMoreMobil() {
            window.location.href = "../../frontend/user/layanan-mobil.php";
        }

        function learnMoreMotor() {
            window.location.href = "../../frontend/user/layanan-motor.php";
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F1F0E8] min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-2 sticky top-0">
        <div class="max-w-screen-xl mx-auto px-6 flex items-center justify-between">
            <div class="flex items-center">
                <img src="../../assets/logo-prorider.png" alt="Logo" class="h-12">
            </div>
            <div class="md:flex items-center space-x-6">
                <a href="../../index.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">Home</a>
                <a href="about-us.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">About</a>
                <a href="#" onclick="window.open('https://wa.me/6287724061150?text=Hi, saya ingin menghubungi Anda!', '_blank')" class="text-gray-700 font-medium hover:text-[#89A8B2]">Contact Us</a>
                <button class="flex items-center border-2 border-black bg-white text-black font-medium rounded-lg px-4 py-2 hover:bg-[#E3E7EA] transition duration-300" onclick="adminPage()">
                    Log in
                </button>
                <button class="flex items-center bg-black text-white font-medium rounded-lg px-4 py-2 hover:bg-[#3E4143] transition duration-300" onclick="signUpPage()">
                    Sign up
                </button>
            </div>
        </div>
    </nav>

    <!-- Banner content -->
    <section class="bg-[url('../../assets/test-Background.jpg')] mt-1/2 flex-grow">
        <div class="bg-black/60 p-8 md:p-12 lg:px-16 lg:py-24 flex items-center justify-center">
            <div class="flex items-center justify-center text-white flex-col">
                <h2 class="text-2xl font-bold text-white sm:text-3xl md:text-5xl">ABOUT US!</h2>
                <p class="hidden max-w-lg text-white/90 md:mt-6 md:block md:text-lg md:leading-relaxed text-center">
                    Kami berkomitmen untuk memberikan layanan terbaik kepada Anda dengan semua fasilitas yang baik dan tim yang sudah teruji dengan baik
                </p>
                <button class="flex items-center bg-[#E5E1DA] text-black font-medium rounded-lg px-4 py-2 hover:bg-[#3E4143] hover:text-[#D8D2C2] transition duration-300 mt-8" onclick="window.open('https://wa.me/6287724061150?text=Hi, saya ingin menghubungi Anda!', '_blank')">
                    Contact
                </button>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <div class="flex items-center justify-center mt-2 my-4">
        <p class="text-2xl text-center font-bold">Pembuat</p>
    </div>

    <!-- SERVICE CARDS -->
    <div class="flex items-center justify-center flex-row gap-4 mb-4">
        <!-- Card Mobil -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-64">
            <div class="p-2">
                <img src="../../assets/default-Profile.jpg" alt="Mikhail" class="w-full h-40 object-cover rounded-md">
            </div>
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-800">Emmanuel - 672022034</h3>
                <p class="text-gray-600 mt-2">UKSW lovers.</p>
            </div>
        </div>
        <!-- End of Card Mobil -->

        <!-- Card Motor -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-64">
            <div class="p-2">
                <img src="../../assets/default-Profile.jpg" alt="Mikhail" class="w-full h-40 object-cover rounded-md">
            </div>
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-800">Daniel - 672022019</h3>
                <p class="text-gray-600 mt-2">KRITIS lovers.</p>
            </div>
        </div>
        <!-- End of Card Motor -->

        <!-- Card Motor -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-64">
            <div class="p-2">
                <img src="../../assets/default-Profile.jpg" alt="Mikhail" class="w-full h-40 object-cover rounded-md">
            </div>
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-800">Alvaro - 672023181</h3>
                <p class="text-gray-600 mt-2">KREATIF lovers.</p>
            </div>
        </div>
        <!-- End of Card Motor -->

        <!-- Card Motor -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-64">
            <div class="p-2">
                <img src="../../assets/default-Profile.jpg" alt="Hendy" class="w-full h-40 object-cover rounded-md">
            </div>
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-800">Hendy - 672023161</h3>
                <p class="text-gray-600 mt-2">INOVATIF lovers.</p>
            </div>
        </div>
        <!-- End of Card Motor -->
    </div>
    <!-- End of SERVICE CARDS -->

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