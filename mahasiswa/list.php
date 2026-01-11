<?php
require 'koneksi.php';
$sql_query = "
    SELECT 
        m.*, 
        p.nama_prodi 
    FROM 
        mahasiswa m
    LEFT JOIN 
        program_studi p ON m.program_studi_id = p.id
    ORDER BY 
        m.nim ASC
"; 

$tampil = $koneksi->query($sql_query); 

if ($tampil === FALSE) {
    echo "<h1>❌ Error Query!</h1>";
    echo "Pesan Error MySQL: <b>" . $koneksi->error . "</b>";
    echo "<br>Periksa kembali nama tabel (mahasiswa, program_studi) dan kolom (program_studi_id, id_prodi)";
    echo "<br><br>Query yang Gagal: " . nl2br(htmlspecialchars($sql_query));
    exit; 
}

$no = 1;
$data = $tampil->fetch_all(MYSQLI_ASSOC); 
?>

<h1>List Data Mahasiswa</h1>
<a href="index2.php?p=create" class="btn btn-primary mb-3">Input Data Mahasiswa</a>
<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Program Studi</th> 
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama_mhs'] ?></td>
                <td><?= $row['tgl_lahir'] ?></td> 
                <td><?= $row['nama_prodi'] ?></td> 
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="index2.php?p=edit&key=<?=$row['nim']?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="mahasiswa/proses.php?nim=<?= $row['nim'] ?>&aksi=hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"> Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>