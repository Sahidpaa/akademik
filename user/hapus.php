<?php
session_start();
include '../koneksi.php';

// Proteksi: Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

// Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query Hapus
    $delete = $koneksi->query("DELETE FROM users WHERE id = '$id'");

    if ($delete) {
        echo "<script>alert('User berhasil dihapus!'); window.location='../index2.php?p=user';</script>";
    } else {
        echo "<script>alert('Gagal menghapus user!'); window.location='../index2.php?p=user';</script>";
    }
} else {
    header("Location: ../index2.php?p=user");
}
?>