<?php
include 'koneksi.php';
$query = $koneksi->query("SELECT * FROM program_studi ORDER BY id DESC");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold"><i class="fas fa-graduation-cap me-2 text-dark"></i> Program Studi</h4>
   
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Prodi</th>
                        <th>Jenjang</th>
                        <th>Akreditasi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($row = $query->fetch_assoc()) : 
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><strong><?= $row['nama_prodi']; ?></strong></td>
                        <td><span class="badge bg-info text-dark"><?= $row['jenjang']; ?></span></td>
                        <td><span class="badge bg-success"><?= $row['akreditasi']; ?></span></td>
                        <td><small class="text-muted"><?= $row['keterangan'] ?: '-'; ?></small></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahProdi" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="prodi/proses_tambah.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Program Studi</label>
                        <input type="text" name="nama_prodi" class="form-control" placeholder="Teknik Informatika" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jenjang</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Akreditasi</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>