<?php
session_start();
include '../koneksi.php';

if (isset($_POST['update_profil'])) {
    $current_user = $_SESSION['username'];
    $username_baru = mysqli_real_escape_string($koneksi, $_POST['username_baru']);
    $password_baru = $_POST['password_baru'];

    if (!empty($password_baru)) {
        $password_hashed = password_hash($password_baru, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username='$username_baru', password='$password_hashed' WHERE username='$current_user'";
    } else {
        $sql = "UPDATE users SET username='$username_baru' WHERE username='$current_user'";
    }

    if ($koneksi->query($sql) === TRUE) {
        $_SESSION['username'] = $username_baru;
        
        echo "<script>
                alert('Profil berhasil diperbarui!');
                window.location='../index.php?p=profil';
              </script>";
    } else {
        echo "<script>alert('Gagal update: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>