<h1 class="mb-4">Edit Data Mahasiswa</h1>
<?php
    require 'koneksi.php';
    // Mengambil key (NIM) dari URL
    $nim_key = $_GET['key']; 
    // Mengubah query dari tabel tamu ke tabel mahasiswa, WHERE berdasarkan nim
    $edit = $koneksi->query("SELECT * FROM mahasiswa WHERE nim='$nim_key'");
    $data = $edit->fetch_assoc();
?>
  <form action="proses.php" method="post">
    <input type="hidden" name="nim_lama" value="<?= $data['nim'] ?>"> 

    <div class="mb-3">
      <label for="nim" class="form-label">NIM</label>
      <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>" readonly required> 
    </div>

    <div class="mb-3">
      <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
      <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $data['nama_mhs'] ?>" required>
    </div>

    <div class="mb-3">
      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" required>
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data['alamat'] ?></textarea>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
    <a href = "index.php?p=mahasiswa" class="btn btn-secondary">List Mahasiswa</a>
  </form>