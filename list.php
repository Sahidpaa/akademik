<h1>List Data Mahasiswa</h1>
<a href="index.php?p=create" class="btn btn-primary mb-3">Input Data Mahasiswa</a>
<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th> 
        </tr>
    </thead>
    <tbody>
        <?php
        require 'koneksi.php';
        // Mengubah query dari tabel tamu ke tabel mahasiswa
        $tampil = $koneksi->query("SELECT * FROM mahasiswa ORDER BY nim ASC"); 
        $no = 1;
        
        $data = $tampil->fetch_all(MYSQLI_ASSOC);
        foreach($data as $row):
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama_mhs'] ?></td>
                <td><?= $row['tgl_lahir'] ?></td> 
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="index.php?p=edit&key=<?=$row['nim']?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses.php?nim=<?= $row['nim'] ?>&aksi=hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"> Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>