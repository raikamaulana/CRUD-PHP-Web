<?php

include 'config.php';
session_start();

if (!isset($_SESSION['username'])){
    header("Location: indexLogin.php");
}
$id = $_GET['id'];
$tampil = mysqli_query($mysqli, "select * from data_murid where id='$id'");
$hasil = mysqli_fetch_array($tampil);
mysqli_query($mysqli, "delete from data_murid where id='$id'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dist/output.css">
    <title>Hapus Data</title>
</head>
<body class="bg-slate-300">
    <div class="h-screen flex justify-center items-center">
        <div class="w-96 border-4 border-black shadow-md shadow-black relative">
            <div class="absolute -top-12 -left-10 bg-yellow-300 border-2 border-black rounded-full">
                <img src="image/active.png" width="40" height="40" alt="notification" class="m-2 animate-pulse">
            </div>
            <div>
                <h1 class="bg-[#00F9FF] px-2 py-1 border-b-4 border-black font-bold font-mono text-2xl">New Notification!</h1>
            </div>
            <div class="px-4 py-4 bg-white">
                <h2 class="font-bold mb-2">Data '<?php echo $hasil['nama']; ?>' telah berhasil dihapus</h2>
                <a href="tampilData.php" class="border-2 border-black px-3 hover:bg-slate-300">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>