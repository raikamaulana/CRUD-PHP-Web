<?php

include 'config.php';

error_reporting(0);

session_start();

if(isset($_SESSION['username'])){
    header("Location: index.php");
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Lakukan verifikasi autentikasi di sini, misalnya dengan menghubungkan ke database

    // Jika autentikasi berhasil, Anda dapat membuat cookie jika Remember Me dicentang
    if (isset($_POST["remember"])) {
        // Set cookie dengan username
        setcookie("remember_email", $email);
    }
    if (isset($_POST["remember"])==false) {
        // Set cookie dengan username
        setcookie("remember_email", "");
    }

    // Redirect atau melakukan tindakan lainnya sesuai dengan hasil autentikasi
}

if (isset($_COOKIE["remember_email"])) {
    $remembered_email = $_COOKIE["remember_email"];
} else {
    $remembered_email = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dist/output.css">
    <title>Login</title>
</head>
<body>
    <div role="alert">
        <?php echo $_SESSION['error']; ?>
    </div>

    <div class="h-screen bg-cover bg-center relative" style="background-image: url('image/smkn6bekasi.jpg')">
    <img src="image/Logo6.png" width="125" height="125" class="absolute top-5 left-5" alt="Logo SMKN 6 BEKASI" aria-hidden>
    <div class="bg-blue-950/30 h-screen flex justify-center items-center">
            <h1 class="absolute w-full text-center left-1/2 -translate-x-1/2 top-10 text-white text-4xl font-bold">Website Data Siswa XII RPL Th.2024 SMKN 6 BEKASI</h1>
            <div class="bg-slate-900 w-96 px-8 pb-8 pt-12 rounded-md border border-slate-950 shadow-inner shadow-white relative">
                <div class="absolute top-5 left-1/2 -translate-x-1/2 w-[352px] h-1 bg-blue-400 ring-1 ring-blue-400 rounded-full"></div>
                <div class="absolute right-4 top-4 w-3 h-3 bg-white ring-4 ring-slate-900 rounded-full"></div>
                <div class="absolute left-1/2 -translate-x-1/2 top-4 w-3 h-3 bg-white ring-4 ring-slate-900 rounded-full"></div>
                <div class="absolute left-4 top-4 w-3 h-3 bg-white ring-4 ring-slate-900 rounded-full"></div>
                <div>
                    <img src="image/login.png" width="35" height="35" alt="login" class="absolute top-14 left-4">
                </div>
                <p class="font-bold text-center text-white text-4xl mb-10">Login</p>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="email" class="text-white font-bold">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email..."  value="<?php echo $remembered_email; ?>" required class="w-full text-sm text-white hover:placeholder-slate-200 bg-slate-700 hover:bg-slate-600 focus:ring-1 mt-2 px-3 py-2 rounded-md focus:outline-none focus:bg-slate-600 focus:placeholder-slate-200 focus:ring-blue-400" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-white font-bold">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukkan password..." value="<?php echo $password; ?>" required class="w-full text-sm text-white hover:placeholder-slate-200 bg-slate-700 hover:bg-slate-600 focus:ring-1 mt-2 px-3 py-2 rounded-md focus:outline-none focus:bg-slate-600 focus:placeholder-slate-200 focus:ring-blue-400" />
                    </div>  
                    <div class="mb-3 flex gap-3 items-center">
                        <input type="checkbox" name="remember" id="remember" class="h-4 w-4">
                        <label for="remember" class="text-slate-200 select-none">Remember me</label>
                    </div>
                    <button name="submit" class="text-white w-full bg-slate-500 rounded-md hover:bg-slate-600 py-1">Login</button>
                    <p class="text-white mt-8">Don't have an account? <a href="register.php" class="bg-blue-500 hover:bg-blue-600 w-full block text-center mt-1 py-1">Register Now</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>