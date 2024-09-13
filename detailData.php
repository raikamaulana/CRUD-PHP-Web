<?php

include 'config.php';

session_start();

if (!isset($_SESSION['username'])){
    header("Location: indexLogin.php");
}

$id = $_GET['id'];
$tampil = mysqli_query($mysqli, "select * from data_murid where id='$id'");
$hasil = mysqli_fetch_array($tampil);


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
    <title><?php echo $hasil['nama'];?> - Detail Data</title>
</head>
<body>
    <!-- Navbar -->
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
    <!-- Navbar End -->
    <div class="pt-24">
        <div class="p-6">
            <div class="border-8 border-black w-full">
                <p class="font-bold bg-[#00F9FF] w-full text-3xl py-2 text-center border-b-8 border-black">Detail Data - <?php echo $hasil['nama']; ?> (<?php echo $hasil['jenis_kelamin']; ?>)</p>
                <div class="p-5 flex gap-5 relative">
                    <div>
                        <a href="tampilData.php" class="absolute right-5 font-bold border-2 border-black bg-[#00F9FF] hover:bg-[#00a2ff] px-3 rounded-md">Kembali</a>
                    </div>
                    <div class="w-full">
                        <div>
                            <div class="flex items-center mb-3">
                                <img src="image/student.png" width="30" height="30" alt="nis-nisn-icon">
                                <p class="font-handlee text-xl font-bold ml-2">NIS / NISN</p>
                            </div>
                            <p class="text-lg font-bold px-3 py-1 border-2 border-black"><?php echo $hasil['nis']; ?> / <?php echo $hasil['nisn']; ?></p>
                        </div>
                        <div class="mt-5">
                            <div class="flex items-center mb-3">
                                <img src="image/location.png" width="30" height="30" alt="place-of-birth-icon">
                                <p class="font-handlee text-xl font-bold ml-2">Alamat</p>
                            </div>
                            <p class="text-lg font-bold px-3 py-1 border-2 border-black"><?php echo $hasil['alamat']; ?></p>
                        </div>
                        <div class="mt-5">
                            <div class="flex items-center mb-3">
                                <img src="image/city.png" width="30" height="30" alt="city-icon">
                                <p class="font-handlee text-xl font-bold ml-2">Tempat Lahir</p>
                            </div>
                            <p class="text-lg font-bold px-3 py-1 border-2 border-black"><?php echo $hasil['tempat_lahir']; ?></p>
                        </div>
                        <div class="mt-5">
                            <div class="flex items-center mb-3">
                                <img src="image/calendar.png" width="30" height="30" alt="date-of-birth-icon">
                                <p class="font-handlee text-xl font-bold ml-2">Tanggal Lahir</p>
                            </div>
                            <p class="text-lg font-bold px-3 py-1 border-2 border-black"><?php echo $hasil['tanggal_lahir']; ?></p>
                        </div>
                    </div>
                    <div class="border-l-4 border-black w-2/4 p-5 flex justify-center">
                        <?php
                        if($hasil["jenis_kelamin"] == "PRIA"){
                            $ikon_url = "image/male-student.png";
                        } else if($hasil["jenis_kelamin"] == "WANITA") {
                            $ikon_url = "image/female-student.png";
                        }
                        ?>
                        <img src="<?php echo $ikon_url; ?>" width="340" height="340">
                    </div>
                </div>
                <div></div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>