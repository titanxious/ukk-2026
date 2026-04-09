<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("location:index.php");
    exit;
}

$id_buku = $_GET['id'];
$username = $_SESSION['username'];

// ambil data user login
$user_login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($user_login);
$id_user = $user['id'];

// cek apakah buku sedang dipinjam user yang sama dan belum dikembalikan
$cek = mysqli_query($koneksi, "
    SELECT * FROM peminjaman 
    WHERE id_user='$id_user' 
    AND id_buku='$id_buku' 
    AND status='dipinjam'
");

if(mysqli_num_rows($cek) > 0){
    echo "<script>
        alert('Buku ini sudah kamu pinjam dan belum dikembalikan!');
        window.location='users.php';
    </script>";
    exit;
}

// simpan peminjaman
mysqli_query($koneksi, "
    INSERT INTO peminjaman (id_user, id_buku, tanggal_pinjam, status)
    VALUES ('$id_user', '$id_buku', CURDATE(), 'dipinjam')
");

echo "<script>
    alert('Buku berhasil dipinjam!');
    window.location='users.php';
</script>";
?>