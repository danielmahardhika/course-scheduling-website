<?php
session_start();
?>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F1F0E8;
        }
        
    </style>
</head>

<body class="flex items-center justify-center min-h-screen bg-[#F1F0E8]">
    <div class="bg-white shadow-md rounded-lg p-8 w-96">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
        <form method="post" action="../../backend/admin/login-proses.php">
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500" placeholder="Masukkan Nama">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500" placeholder="Masukkan Password">
            </div>

            <div class="flex justify-between">
                <input type="submit" value="Submit" class="w-full bg-black text-white font-medium rounded-lg px-4 py-2 hover:bg-gray-500 transition duration-300 mt-5">
            </div>
        </form>
    </div>
</body>

</html>