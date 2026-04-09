<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f4f6f9;">

<div class="container mt-5">
    <div class="card p-4 text-center shadow">

        <h3> Hapus Buku</h3>
        <p>Yakin ingin menghapus buku ini?</p>

        <a href="proses_hapus.php?id=<?= $id; ?>" class="btn btn-danger">Ya, Hapus</a>
        <a href="admin.php" class="btn btn-secondary">Batal</a>

    </div>
</div>

</body>
</html>