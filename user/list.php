<?php
// Pastikan file koneksi sudah ter-include dari index2.php
include 'koneksi.php';

// Ambil data dari database
$query = $koneksi->query("SELECT id, username, email, created_at FROM users ORDER BY id DESC");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold"><i class="fas fa-user-cog me-2"></i> Manajemen User</h4>
</div>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Tgl Terdaftar</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = $query->fetch_assoc()) : 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><strong><?= $row['username']; ?></strong></td>
                <td><?= $row['email']; ?></td>
                <td><?= date('d M Y', strtotime($row['created_at'])); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>