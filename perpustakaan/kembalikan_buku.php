<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("location:index.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($koneksi, "
    UPDATE peminjaman 
    SET status='dikembalikan', tanggal_kembali=CURDATE()
    WHERE id='$id'
");

echo "<script>
    alert('Buku berhasil dikembalikan!');
    window.location='data_peminjaman.php';
</script>";
?>