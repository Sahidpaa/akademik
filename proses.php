<?php
require 'koneksi.php'; 

// === BLOK KODE UNTUK MENYIMPAN DATA (CREATE) ===
if(isset($_POST['submit'])){
    // Mengambil data dari form create.php
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    // Query INSERT ke tabel mahasiswa
    $sql ="INSERT INTO mahasiswa(nim, nama_mhs, tgl_lahir, alamat)
             VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat')";
    
    $query = $koneksi->query($sql); 
    if($query){
        // Redirect ke list data mahasiswa
        header('Location: index.php?p=mahasiswa'); 
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }    
}

// === BLOK KODE UNTUK UPDATE DATA (UPDATE) ===
if(isset($_POST['update'])){
    // Mengambil data dari form edit.php
    $nim_key = $_POST['nim_lama']; // Primary Key untuk WHERE
    $nama_mhs = $_POST['nama_mhs']; 
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    // Query UPDATE ke tabel mahasiswa
    $sql ="UPDATE mahasiswa SET 
             nama_mhs='$nama_mhs',
             tgl_lahir='$tgl_lahir',
             alamat='$alamat'
             WHERE nim= '$nim_key'";
    
    $query = $koneksi->query($sql); 
    if($query){
        // Redirect ke list data mahasiswa
        header('Location: index.php?p=mahasiswa'); 
    } else {
        echo "Gagal mengupdate data: " . $koneksi->error;
    }    
}

// === BLOK KODE UNTUK HAPUS (DELETE) ===
if(isset($_GET['aksi']) && $_GET['aksi'] === 'hapus'){
    // Mengambil NIM dari parameter URL
    $nim = $_GET['nim']; 

    // Query DELETE dari tabel mahasiswa
    $query = $koneksi->query("DELETE FROM mahasiswa WHERE nim='$nim'");

    if($query){
        // Redirect ke list data mahasiswa
        header('Location: index.php?p=mahasiswa'); 
    } else {
        echo "Gagal menghapus data: " . $koneksi->error;
    } 
}
?>