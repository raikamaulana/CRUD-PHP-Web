<?php

include 'config.php';
session_start();

if (!isset($_SESSION['username'])){
    header("Location: indexLogin.php");
}


if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Lakukan pencarian di database berdasarkan nama atau ID
    $sql = "SELECT * FROM data_murid WHERE nama LIKE '%$search%' OR id = '$search'";
    $result = mysqli_query($mysqli, $sql);

    // Tampilkan hasil pencarian
    if (mysqli_num_rows($result) > 0) {
        // Data ditemukan, tampilkan hasil pencarian
        while ($row = mysqli_fetch_assoc($result)) {
            // Tampilkan data sesuai kebutuhan
        }
    } else {
        // Tidak ada data yang cocok dengan kriteria pencarian
        echo "Data tidak ditemukan.";
    }
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
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Chakra+Petch:wght@400;500;600;700&family=Just+Another+Hand&family=Nanum+Gothic&family=Pixelify+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>Data Siswa XII RPL 3</title>
</head>
<body>
    <nav class="w-full fixed px-8 py-5 bg-blue-900 text-white">
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
    </nav>
    <div class="h-screen flex justify-center items-center">
        <div class="">
            <h1 class="font-handlee text-4xl font-bold bg-blue-900 px-5 py-2 text-white rounded-full mb-5 shadow-md shadow-slate-700">Data Siswa XII RPL 3 Angkatan 2023</h1>
            <img src="image/kunikida.png" width="200" height="200" alt="" class="mx-auto">
        </div>
    </div>
    <div class="p-5" id="table">
        <div class="mb-8">
            <div class="w-full bg-slate-900 p-4">
                <!-- <p class="text-center text-white font-chakra text-5xl mb-7">PENCARIAN DATA</p> -->
                <div class="flex justify-center items-center">
                    <form action="tampilData.php#table" method="get">
                        <div class = "flex w-full">
                            <div class = "text-center w-40 flex justify-between items-center px-3 py-2 bg-yellow-500 font-semibold">
                                <label for="konci" class="font-pixelify text-xl">CARI</label>
                                <img src="image/calendar.png" height="10" width="20" alt="">
                            </div>
                            <?php
                                $nilaiCari = isset($_GET["cari"]) ? $_GET["cari"] : "";
                                // $pencarian = !isset($_GET["cari"]) ? "<p>Data yang dicari tidak ada</p>" : "<p>Hasil pencarian: ".$_GET["cari"]."</p>"
                                $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

                                if (empty($cari)) {
                                    $pencarian = "<p>Data yang dicari tidak ada</p>";
                                } else {
                                    $pencarian = "<p align='center' style='font-weight=700'>Hasil pencarian: " . htmlspecialchars($cari) . "</p>";
                                }
                            ?>
                            <input type="text" name="cari" id="konci" value="<?php echo $nilaiCari; ?>" placeholder="cari nama ..." class="focus:outline-none border-2 bg-black/50 text-yellow-500 border-yellow-500 px-4 w-96 font-semibold placeholder-yellow-600 italic font-chakra">
                            <div class="group hover:bg-cyan-300 ml-5 flex items-center px-1 border-2 border-cyan-300">
                                <input type="submit" value="CARI" class="px-8 py-1 border-yellow-500 group-hover:bg-yellow-500 group-hover:text-black group-hover:font-bold group-hover:ease-in-out group-hover:transition-all group-hover:duration-500 border-2 bg-black text-white font-semibold tracking-wider">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center" align="center"><?php echo $pencarian; ?></p>
            
        </div>
        <div>
            <table border="1" class="w-full bg-white shadow-md rounded-md mb-6">
                <tr class="bg-blue-900 text-white border-2 border-black">
                    <th class="py-2 px-2 border-r">No.</th>
                    <th class="py-2 border-r">NIS</th>
                    <th class="py-2 border-r">NISN</th>
                    <th class="py-2 border-r">Nama</th>
                    <th class="py-2 border-r">Jenis Kelamin</th>
                    <th class="py-2">Aksi</th>
                </tr>
                <?php
                    if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        $data = mysqli_query($mysqli, "select * from data_murid where nama like '%".$cari."%'");
                    } else {
                        $data = mysqli_query($mysqli, "select * from data_murid");
                    }
                        $no = 1;
                        while ($hasil = mysqli_fetch_array($data)){
                ?> 
                <tr class="border-2 border-black">
                    <th class="py-2 border-r border-black"><?php echo $no++ ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["nis"]; ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["nisn"]; ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["nama"]; ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["jenis_kelamin"]; ?></th>
                    <th class="py-2 ">
                        <a href="detailData.php?id=<?php echo $hasil['id']; ?> " class="bg-blue-900 text-white border border-black px-2 rounded-full">Detail</a>
                        <a href="editData.php?id=<?php echo $hasil['id']; ?> " class="bg-blue-900 text-white border border-black px-2 rounded-full">Edit</a>
                        <a href="hapusData.php?id=<?php echo $hasil['id']; ?> " class="bg-blue-900 text-white border border-black px-2 rounded-full">Hapus</a>
                    </th>
                </tr>
                <?php
                    }
                ?>
            </table>
            <!-- <table border="1" class="w-full bg-white shadow-md rounded-md mb-4">
                <tr class="bg-red-800 text-white border-2 border-black">
                    <th class="py-2 px-2 border-r">No.</th>
                    <th class="py-2 border-r">NIS</th>
                    <th class="py-2 border-r">NISN</th>
                    <th class="py-2 border-r">Nama</th>
                    <th class="py-2 border-r">Jenis Kelamin</th>
                    <th class="py-2 border-r">Alamat</th>
                    <th class="py-2 border-r">Tempat Lahir</th>
                    <th class="py-2 border-r">Tanggal Lahir</th>
                    <th class="py-2">Aksi</th>
                </tr>
                <?php
                    $tampil = mysqli_query($mysqli, "select * from data_murid;");
                    $no = 1;
                    while($hasil = mysqli_fetch_array($tampil)){
                ?>
                <tr class="border-2 border-black">
                    <th class="py-2 border-r border-black"><?php echo $no++ ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["nis"]; ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["nisn"]; ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["nama"]; ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["jenis_kelamin"]; ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["alamat"]; ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["tempat_lahir"]; ?></th>
                    <th class="py-2 border-r border-black"><?php echo $hasil["tanggal_lahir"]; ?></th>
                    <th class="py-2 ">
                        <a href="editData.php?id=<?php echo $hasil['id']; ?> " class="bg-red-800 text-white border border-black px-2 rounded-full">Edit</a>
                        <a href="hapusData.php?id=<?php echo $hasil['id']; ?> " class="bg-red-800 text-white border border-black px-2 rounded-full">Hapus</a>
                    </th>
                </tr>
                <?php
                    }
                ?>
            </table> -->
            <img src="image/fast-forward.png" width="50" height="50" alt="panah" class="mx-auto animate-bounce">
            <a href="cetakData.php" class="flex mx-auto py-1 px-3 mt-3 rounded-md gap-2 max-w-max font-bold border-2 border-black hover:scale-110 transition-transform duration-500 shadow-md shadow-slate-700">
                <img src="image/printing-text.png" width="20" height="20" alt="">
                Cetak Data
            </a>
        </div>
    </div>
</body>
</html>