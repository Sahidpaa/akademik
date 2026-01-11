<?php
$host = "localhost";
$user = "root";
$password = "";

$db = "db-akademik";

$koneksi = new Mysqli($host, $user, $password, $db);

if($koneksi->connect_error){
    // Menggunakan die() agar koneksi gagal langsung berhenti
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk menghitung total mahasiswa
$query_mhs = $koneksi->query("SELECT COUNT(*) as total FROM mahasiswa");
$data_mhs = $query_mhs->fetch_assoc();
$total_mahasiswa = $data_mhs['total'];

// Query untuk menghitung total prodi (opsional)
$query_prodi = $koneksi->query("SELECT COUNT(*) as total FROM program_studi");
$data_prodi = $query_prodi->fetch_assoc();
$total_prodi = $data_prodi['total'];
?>