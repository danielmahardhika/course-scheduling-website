<?php
session_start();
?>
<html>

<head>
    <title>Login Instruktur</title>
    <!-- Menambahkan Favicon -->
    <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function signUpPage() {
            window.location.href = "view-signup-user.php";
        }
    </script>
</head>

<body class="flex flex-col h-screen justify-between bg-[#F1F0E8]">

    <!-- LOGIN FORM -->
    <div class="flex items-center justify-center flex-grow">
        <div class="bg-white rounded-lg shadow-md p-8 w-96">
            <h1 class="text-2xl font-semibold text-center mb-6">Login Instruktur</h1>
            <form method="post" action="../../backend/instruktur/proses-login-instruktur.php">

                <div class="mb-4">
                    <label class="block text-gray-700" for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700" for="password">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                </div>

                <!-- SUBMIT BUTTON -->
                <button type="submit" class="w-full bg-black text-white font-semibold py-2 rounded-lg hover:bg-[#3E4143] transition duration-200">
                    Submit
                </button>
            </form>
        </div>
    </div>
    <!-- End of LOGIN FORM -->

</body>

</html>