
<?php
require 'koneksi.php';

$query_prodi = $koneksi->query("SELECT id, nama_prodi FROM program_studi ORDER BY nama_prodi ASC");
$data_prodi = $query_prodi->fetch_all(MYSQLI_ASSOC);
?>

<h1 class="mb-4">Input Data Mahasiswa</h1>

<form action="mahasiswa/proses.php" method="post">
    
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" required>
    </div>

    <div class="mb-3">
        <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required>
    </div>

    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
    </div>

    <div class="mb-3">
        <label for="program_studi_id" class="form-label">Program Studi</label>
        <select class="form-control" id="program_studi_id" name="program_studi_id" required>
            <option value="">-- Pilih Program Studi --</option>
            <?php foreach ($data_prodi as $prodi): ?>
                <option value="<?= $prodi['id'] ?>">
                    <?= $prodi['nama_prodi'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
    <a href="index.php?p=mahasiswa" class="btn btn-secondary">Cancel</a>
</form>