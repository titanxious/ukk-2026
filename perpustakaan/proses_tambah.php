<?php
include 'koneksi.php';

$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$kategori = $_POST['kategori'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

// upload gambar
$nama_file = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];

move_uploaded_file($tmp, "upload/" . $nama_file);

mysqli_query($koneksi, "INSERT INTO buku 
VALUES('', '$judul', '$penulis', '$penerbit', '$tahun', '$kategori', '$stok', '$deskripsi', '$nama_file')");

header("location:admin.php");
?>