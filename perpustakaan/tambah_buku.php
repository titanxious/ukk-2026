<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f4f6f9;">

<div class="container mt-5">
    <div class="card shadow p-4">
        
        <h3 class="mb-4 text-center"> Tambah Buku</h3>

        <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="Novel">Novel</option>
                    <option value="Komik">Komik</option>
                    <option value="Pelajaran">Pelajaran</option>
                    <option value="Sejarah">Sejarah</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" value="1">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label>Cover Buku</label>
                <input type="file" name="cover" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="admin.php" class="btn btn-secondary">⬅ Kembali</a>
                <button type="submit" class="btn btn-success"> Simpan</button>
            </div>

        </form>

    </div>
</div>

</body>
</html>