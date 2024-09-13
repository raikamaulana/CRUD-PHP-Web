<?php

session_start();

if (!isset($_SESSION['username'])){
    header("Location: indexLogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dist/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Inter:wght@200;500;700&family=Just+Another+Hand&family=Nanum+Gothic&family=Pixelify+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <div class="w-full fixed px-8 py-5 bg-blue-900 text-white z-50">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="index.php" class="mr-20 font-pixelify text-2xl">XII RPL 3</a>
                <ul class="flex gap-14">
                    <li>
                        <a href="tampilData.php">Lihat Data</a>
                    </li>
                    <li>
                        <a href="formInput.php">Input Data</a>
                    </li>
                    <li>
                        <a href="albumKelas.php">Album Kelas</a>
                    </li>
                </ul>
            </div>
            <div class="flex gap-8">
                <form action="tampilData.php" method="get">
                    <input type="text" name="search" class="rounded-full text-black px-3 bg-slate-200 focus:outline-none focus:placeholder-blue-900 focus:ring-2 focus:ring-[#00e1ff]" placeholder="Cari data...">
                    <button type="submit" class="bg-blue-900 border border-white text-white px-2 rounded-full">Cari</button>
                </form>
                <p>Selamat Datang, <span class="font-bold"><?php echo $_SESSION['username']; ?></span> !</p>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <!-- komponen selamat datang -->
    <div class="text-center h-screen flex justify-center bg-cover bg-center items-center" style="background-image:url('image/pemandangan.gif')">
        <div class="relative">
            <img src="image/splash.png" width="50" height="50" class="absolute -right-16 -top-10">
            <img src="image/splash.png" width="50" height="50" class="absolute -left-16 -bottom-10 rotate-180">
            <h1 class="font-handlee text-blue-900 font-bold mx-auto text-6xl">Selamat Datang di Website
                <span class="block font-mono bg-blue-900 text-white mt-2 py-2">XII RPL 3</span>
            </h1>
        </div>
    </div>
    <!-- komponen selamat datang -->
    <!-- komponen apa itu RPL -->
    <div class="mt-20 p-8 text-white bg-fixed bg-bottom" style="background-image:url(image/xii-rpl-3.png)">
        <h1 class="text-center text-5xl px-6 py-2 mx-auto max-w-max font-handlee font-bold border-t-4 border-blue-800 mb-20">Perkenalan</h1>
        <div class="flex">
            <div class="w-2/4">
                <img src="image/ayanokoji-halo.png" width="200" height="200" alt="" class="mx-auto">
            </div>
            <div class="w-full flex">
                <div class="flex items-center px-8 bg-blue-900">
                    <img src="image/rpl-logo-smkn6.png" width="180" height="180" alt="logo-rpl">
                </div>
                <div class="pl-5 border-l-4 border-black bg-black/50">
                    <h1 class="text-2xl font-inter font-bold max-w-max pr-5 border-r-4 border-blue-900 mb-5">XII RPL 3</h1>
                    <p>Merupakan kelas dengan jurusan Rekayasa Perangkat Lunak (RPL) yang berada di SMK Negeri 6 Kota Bekasi dari tahun 2021.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- komponen sih  RPL itu -->
    <!-- Footer -->
    <div>
        
    </div>
    <!-- Footer -->
    
</body>
</html>