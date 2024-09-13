<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "login_app_raika";

$mysqli = mysqli_connect($server,$user,$password,$database);

if(!$mysqli){
    die("<script>alert('Database gagal terhubung')</script>");
}

?>