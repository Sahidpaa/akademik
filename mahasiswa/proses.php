<?php
session_start();
require '../koneksi.php'; 

if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $program_studi_id = $_POST['program_studi_id']; 
    $alamat = $_POST['alamat'];

    $sql ="INSERT INTO mahasiswa(nim, nama_mhs, tgl_lahir, program_studi_id, alamat)
             VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$program_studi_id', '$alamat')";
    
    $query = $koneksi->query($sql); 
    if($query){
        
        header('Location: ../index.php?p=mahasiswa'); 
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }    
}

if(isset($_POST['update'])){
    
    $nim_key = $_POST['nim_lama']; 
    $nama_mhs = $_POST['nama_mhs']; 
    $tgl_lahir = $_POST['tgl_lahir'];
    $program_studi_id = $_POST['program_studi_id']; 
    $alamat = $_POST['alamat'];

    $sql ="UPDATE mahasiswa SET 
              nama_mhs='$nama_mhs',
              tgl_lahir='$tgl_lahir',
              program_studi_id='$program_studi_id',  
              alamat='$alamat'
              WHERE nim= '$nim_key'"; 
    
    $query = $koneksi->query($sql); 
    if($query){
    
       header('Location: ../index.php?p=mahasiswa');
    } else {
        echo "Gagal mengupdate data: " . $koneksi->error;
    }    
}

if(isset($_GET['aksi']) && $_GET['aksi'] === 'hapus'){
    $nim = $_GET['nim']; 

    $query = $koneksi->query("DELETE FROM mahasiswa WHERE nim='$nim'");

    if($query){
    
        header('Location: ../index.php?p=mahasiswa');
    } else {
        echo "Gagal menghapus data: " . $koneksi->error;
    } 
}
?>