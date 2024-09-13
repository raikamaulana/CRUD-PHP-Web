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
    <title>FORM DATA</title>
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
    <div class="pt-24">
            <div class="border-8 border-blue-900 flex justify-center">
                <div class="bg-yellow-500 w-2/4 flex justify-center items-center">
                    <img src="image/Logo6.png" alt="logo6" width="250" height="250">
                </div>
                <div class="w-full p-5">
                    <h1 class="font-pixelify font-bold text-4xl mb-8">FORM DATA <span class="px-2 text-white bg-blue-900">XII RPL 3</span></h1>
                    <form action="prosesInput.php" method="post">
                        <div class="w-full">
                            <div class="flex items-center mb-4">
                                <label for="nis" class="w-1/3 font-nanum font-bold tracking-widest text-xl">NIS</label>
                                <input type="number" id="nis" name="nis" class="w-full border-2 border-blue-700 text-xl hover:placeholder-slate-200  focus:ring-1 px-3 py-1 focus:outline-none  focus:placeholder-slate-200 focus:ring-blue-800" >
                            </div>
                            <div class="flex items-center mb-4">
                                <label for="nisn" class="w-1/3 font-nanum font-bold tracking-widest text-xl">NISN</label>
                                <input type="number" id="nisn" name="nisn" class="w-full border-2 border-blue-700 text-xl hover:placeholder-slate-200  focus:ring-1 px-3 py-1 focus:outline-none  focus:placeholder-slate-200 focus:ring-blue-800" >
                            </div>
                            <div class="flex items-center mb-4">
                                <label for="nama" class="w-1/3 font-nanum font-bold tracking-widest text-xl">Nama</label>
                                <input type="text" id="nama" name="nama" class="w-full border-2 border-blue-700 text-xl hover:placeholder-slate-200  focus:ring-1 px-3 py-1 focus:outline-none  focus:placeholder-slate-200 focus:ring-blue-800" >
                            </div>
                            <div class="flex items-center mb-4">
                                <label class="w-1/3 font-nanum font-bold tracking-widest text-xl">Jenis Kelamin</label>
                                <div class="flex w-full">
                                    <div class="w-1/3">
                                        <input type="radio" id="pria" name="jeniskelamin" value="PRIA" />
                                        <label for="pria" >PRIA</label>
                                    </div>
                                    <div class="w-full">
                                        <input type="radio" id="wanita" name="jeniskelamin" value="WANITA" />
                                        <label for="wanita" >WANITA</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center mb-4">
                                <label for="alamat" class="w-1/3 font-nanum font-bold tracking-widest text-xl">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="w-full border-2 border-blue-700 text-xl hover:placeholder-slate-200  focus:ring-1 px-3 py-1 focus:outline-none  focus:placeholder-slate-200 focus:ring-blue-800" >
                            </div>
                            <div class="flex items-center mb-4">
                                <label for="tempatlahir" class="w-1/3 font-nanum font-bold tracking-widest text-xl">Tempat Lahir</label>
                                <input type="text" id="tempatlahir" name="tempatlahir" class="w-full border-2 border-blue-700 text-xl hover:placeholder-slate-200  focus:ring-1 px-3 py-1 focus:outline-none  focus:placeholder-slate-200 focus:ring-blue-800" >
                            </div>
                            <div class="flex items-center mb-6">
                                <label for="tanggallahir" class="w-1/3 font-nanum font-bold tracking-widest text-xl">Tanggal Lahir</label>
                                <input type="date" id="tanggallahir" name="tanggallahir" class="w-full border-2 border-blue-700 text-xl hover:placeholder-slate-200  focus:ring-1 px-3 py-1 focus:outline-none  focus:placeholder-slate-200 focus:ring-blue-800" >
                            </div>
                            <div class="flex items-center">
                                <div class="w-1/3"></div>
                                <div class="w-full flex gap-20">
                                    <input type="submit" value="Kirim" class="w-full bg-blue-900 hover:bg-blue-700 text-white py-1 text-xl" >
                                    <input type="reset" value="Reset" class="w-full bg-blue-900 hover:bg-blue-700 text-white py-1 text-xl" >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</body>
</html>