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
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Just+Another+Hand&family=Nanum+Gothic&family=Pixelify+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>Album Kelas - XII RPL 3</title>
</head>
<body>
    <div class="w-full fixed px-8 py-5 bg-blue-900 text-white">
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
                <p>Selamat Datang, <span class="font-bold"><?php echo $_SESSION['username']; ?></span> !</p>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="h-screen flex justify-center items-center">
        <div class="">
            <h1 class="font-handlee text-5xl font-bold mb-5">Sedang Masa Percobaan, tunggu dulu ya.... :) </h1>
            <p class="flex justify-center">
                <a href="index.php" class="bg-blue-900 text-white px-5 py-2 text-xl rounded-full">Kembali</a>
            </p>
        </div>
    </div>
</body>
</html>