<?php
// 1. Mulai session agar PHP tahu session mana yang akan dihapus
session_start();

// 2. Hapus semua data session yang ada
session_unset();

// 3. Hancurkan session secara permanen dari server
session_destroy();

// 4. Alihkan pengguna kembali ke halaman login (index.php)
header("Location: login.php");
exit();
?>