<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("location:index.php");
    exit;
}

$data = mysqli_query($koneksi, "
    SELECT peminjaman.*, users.username, buku.judul
    FROM peminjaman
    JOIN users ON peminjaman.id_user = users.id
    JOIN buku ON peminjaman.id_buku = buku.id
    ORDER BY peminjaman.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f4f6f9;">

<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">📚 Admin Perpustakaan</span>
    <div>
        <a href="admin.php" class="btn btn-primary btn-sm">Data Buku</a>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">
    <h3 class="mb-3">Data Peminjaman Buku</h3>

    <div class="card p-3">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; while($d = mysqli_fetch_assoc($data)){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['username']; ?></td>
                    <td><?= $d['judul']; ?></td>
                    <td><?= $d['tanggal_pinjam']; ?></td>
                    <td><?= $d['tanggal_kembali'] ? $d['tanggal_kembali'] : '-'; ?></td>
                    <td><?= $d['status']; ?></td>
                    <td>
                        <?php if($d['status'] == 'dipinjam'){ ?>
                            <a href="kembalikan_buku.php?id=<?= $d['id']; ?>" 
                               class="btn btn-success btn-sm"
                               onclick="return confirm('Yakin buku ini dikembalikan?')">
                               Kembalikan
                            </a>
                        <?php } else { ?>
                            <span class="badge bg-secondary">Selesai</span>
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