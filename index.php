<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Data Mahasiswa</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=mahasiswa">Data Mahasiswa</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">User</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <?php
        // Mengubah p=bukutamu menjadi p=mahasiswa
        $page = isset($_GET['p']) ? $_GET['p'] : 'home'; 
        // echo $page; // Baris ini sebaiknya dihapus
        if($page == 'home') include 'home.php';
        if($page == 'mahasiswa') include 'list.php'; // Menggunakan list.php
        if($page == 'create') include 'create.php';
        if($page == 'edit') include 'edit.php';
        ?> 
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>