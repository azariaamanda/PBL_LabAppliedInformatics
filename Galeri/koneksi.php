<?php
$host = "localhost";
$user = "root";
$pass = ""; // default Laragon kosong
$db   = "LAB_AI";

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>


