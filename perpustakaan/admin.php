<?php
session_start();
include 'koneksi.php';

// proteksi admin
if($_SESSION['role'] != 'admin'){
    header("location:login.php");
}

// ambil data buku
$data = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }
        .navbar {
            background: #343a40;
        }
        .navbar a {
            color: white !important;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg px-3">
    <a class="navbar-brand text-white">Admin Perpustakaan</a>
    <div class="ms-auto">
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h3> Data Buku</h3>
        <div>
            <a href="data_peminjaman.php" class="btn btn-primary">Data Peminjaman</a>
            <a href="tambah_buku.php" class="btn btn-success">+ Tambah Buku</a>
        </div>
</div>

    <!-- TABEL -->
    <div class="card p-3">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $no = 1;
            while($d = mysqli_fetch_assoc($data)){
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['judul']; ?></td>
                    <td><?= $d['penulis']; ?></td>
                    <td><?= $d['tahun']; ?></td>
                    <td>
                        <a href="edit_buku.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_buku.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>