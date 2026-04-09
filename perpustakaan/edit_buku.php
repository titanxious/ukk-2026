<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f4f6f9;">

<div class="container mt-5">
    <div class="card p-4 shadow">

        <h3 class="mb-3"> Edit Buku</h3>

        <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $d['id']; ?>">

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= $d['judul']; ?>">
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="<?= $d['penulis']; ?>">
            </div>

            <div class="mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" value="<?= $d['tahun']; ?>">
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" value="<?= $d['stok']; ?>">
            </div>

            <div class="mb-3">
                <label>Cover (kosongkan jika tidak diubah)</label><br>
                <?php if($d['cover']){ ?>
                    <img src="upload/<?= $d['cover']; ?>" width="80"><br><br>
                <?php } ?>
                <input type="file" name="cover" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="admin.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>