<?php
$host = "localhost";
$user = "root";
$password = "";
// Mengubah database menjadi db_akademik
$db = "db-akademik";

$koneksi = new Mysqli($host, $user, $password, $db);

if($koneksi->connect_error){
    // Menggunakan die() agar koneksi gagal langsung berhenti
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>