<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "wahcompany";

$koneksi = mysqli_connect($host, $user, $password, $database);
if (!$koneksi){
    die("Gagal terhubung dengan database: ".mysqli_connect_error());
}
