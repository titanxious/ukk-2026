<?php
session_start();
include 'koneksi.php';

// proteksi user
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("location:index.php");
    exit;
}

$username = $_SESSION['username'];

// ambil data user login
$user_login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($user_login);
$id_user = $user['id'];

// ambil data buku
$data = mysqli_query($koneksi, "SELECT * FROM buku");

// ambil data peminjaman user
$peminjaman = mysqli_query($koneksi, "
    SELECT peminjaman.*, buku.judul, buku.penulis 
    FROM peminjaman
    JOIN buku ON peminjaman.id_buku = buku.id
    WHERE peminjaman.id_user = '$id_user'
    ORDER BY peminjaman.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }
        .navbar {
            background: #0d6efd;
        }
        .navbar a {
            color: white !important;
        }
        .card {
            border-radius: 15px;
        }
        .book-card {
            min-height: 220px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar px-3">
    <span class="navbar-brand text-white">📚 Perpustakaan User</span>
    <div class="ms-auto text-white me-3">
        Halo, <b><?= $_SESSION['username']; ?></b>
    </div>
    <div>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">

    <h3 class="mb-3">📖 Daftar Buku</h3>

    <!-- CARD LIST -->
    <div class="row">
        <?php while($d = mysqli_fetch_assoc($data)){ ?>
            
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm p-3 book-card">
                    
                    <h5><?= $d['judul']; ?></h5>
                    <p class="mb-1"><b>Penulis:</b> <?= $d['penulis']; ?></p>
                    <p class="mb-1"><b>Tahun:</b> <?= $d['tahun']; ?></p>

                    <div class="mt-3">
                        <a href="pinjam_buku.php?id=<?= $d['id']; ?>" 
                           class="btn btn-primary btn-sm"
                           onclick="return confirm('Yakin ingin meminjam buku ini?')">
                           Pinjam Buku
                        </a>
                    </div>

                </div>
            </div>

        <?php } ?>
    </div>

    <hr class="my-5">

    <h3 class="mb-3">📚 Riwayat Peminjaman Saya</h3>

    <div class="card p-3">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while($p = mysqli_fetch_assoc($peminjaman)){ 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $p['judul']; ?></td>
                    <td><?= $p['penulis']; ?></td>
                    <td><?= $p['tanggal_pinjam']; ?></td>
                    <td><?= $p['tanggal_kembali'] ? $p['tanggal_kembali'] : '-'; ?></td>
                    <td>
                        <?php if($p['status'] == 'dipinjam'){ ?>
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        <?php } else { ?>
                            <span class="badge bg-success">Dikembalikan</span>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>