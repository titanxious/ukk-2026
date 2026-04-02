<?php 
include '../jembatan/koneksi.php';

if (isset($_GET['id_siswa'])) {
    $id = intval($_GET['id_siswa']);

    $query = "DELETE FROM siswa WHERE id_siswa = $id";
    $delete = mysqli_query($koneksi, $query);

    if ($delete) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location='../dashboard.php';
            </script>";
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan";
}
?>