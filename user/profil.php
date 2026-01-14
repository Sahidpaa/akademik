<?php
$sess_user = $_SESSION['username']; 
$query = $koneksi->query("SELECT * FROM users WHERE username='$sess_user'");
$data = $query->fetch_assoc();
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i> Pengaturan Profil</h5>
            </div>
            <div class="card-body p-4">
                <form action="user/prosesprofil.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Alamat Email</label>
                        <input type="email" class="form-control bg-light" value="<?= $data['email']; ?>" readonly>
                        <div class="form-text text-danger small">* Email tidak dapat diubah sesuai dengan ketentuan yang berlaku.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Username Baru</label>
                        <input type="text" name="username_baru" class="form-control" value="<?= $data['username']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kata Sandi Baru</label>
                        <input type="password" name="password_baru" class="form-control" placeholder="Kosongkan jika tidak ingin ganti password">
                    </div>

                    <hr class="my-4">
                    <div class="d-grid">
                        <button type="submit" name="update_profil" class="btn btn-primary shadow">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>