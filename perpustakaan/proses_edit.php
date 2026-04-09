<?php
include 'koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$stok = $_POST['stok'];

$nama_file = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];

if($nama_file != ""){
    move_uploaded_file($tmp, "upload/".$nama_file);

    mysqli_query($koneksi, "UPDATE buku SET
        judul='$judul',
        penulis='$penulis',
        tahun='$tahun',
        stok='$stok',
        cover='$nama_file'
        WHERE id='$id'
    ");
} else {
    mysqli_query($koneksi, "UPDATE buku SET
        judul='$judul',
        penulis='$penulis',
        tahun='$tahun',
        stok='$stok'
        WHERE id='$id'
    ");
}

header("location:admin.php");
?>