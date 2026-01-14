
<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Akademik - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { z-index: 1050; }
        /* Style untuk Sidebar */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 70px;
            background-color: #212529;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 4px 10px;
            border-radius: 8px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #ffc107;
            color: #000;
        }
        .main-content { margin-left: 250px; padding-top: 80px; }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-warning" href="#">
                <i class="fas fa-university me-2"></i>AKADEMIK
            </a>
            <div class="ms-auto d-flex align-items-center">
                <span class="text-white me-3 d-none d-md-block">Halo, <strong><?php echo $_SESSION['username']; ?></strong></span>
                <a href="logout.php" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin keluar?')">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo (!isset($_GET['p']) || $_GET['p'] == 'home') ? 'active' : ''; ?>" href="index.php">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'mahasiswa') ? 'active' : ''; ?>" href="index.php?p=mahasiswa">
                    <i class="fas fa-users me-2"></i> Data Mahasiswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'prodi') ? 'active' : ''; ?>" href="index.php?p=prodi">
                    <i class="fas fa-graduation-cap me-2"></i> Program Studi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (isset($_GET['p']) && $_GET['p'] == 'user') ? 'active' : ''; ?>" href="index.php?p=user">
                    <i class="fas fa-user-cog me-2"></i> Manajemen User
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container-fluid">
            
            <?php if(!isset($_GET['p']) || $_GET['p'] == 'home'): ?>
                <div class="row mb-4">
                 
                </div>
                
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card bg-primary text-white shadow border-0">
                            <div class="card-body">
                                <h6>Total Mahasiswa</h6>
                                <h2><?php echo $total_mahasiswa; ?></h2>
                                <i class="fas fa-users float-end opacity-50" style="font-size: 2rem; margin-top: -40px;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card bg-success text-white shadow border-0">
                            <div class="card-body">
                                <h6>Program Studi</h6>
                                <h2><?php echo $total_prodi; ?></h2>
                                <i class="fas fa-graduation-cap float-end opacity-50" style="font-size: 2rem; margin-top: -40px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm border-0 mt-3">
                <div class="card-body p-4">
                    <?php
                        $page = isset($_GET['p']) ? $_GET['p'] : 'home'; 
                        if($page == 'home') include 'home.php';
                        if($page == 'mahasiswa') include 'mahasiswa/list.php'; 
                        if($page == 'create') include 'mahasiswa/create.php';
                        if($page == 'edit') include 'mahasiswa/edit.php';
                        if($page == 'user') include 'user/list.php';
                        if($page == 'prodi') include 'prodi/list.php';
                        if($page == 'edit_prodi') include 'prodi/edit.php'; 
                    ?>
                </div>
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
