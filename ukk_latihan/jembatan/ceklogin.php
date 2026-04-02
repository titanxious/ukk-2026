<?php

//mengaktifkan session php
session_start();

//menghubungkan dengan koneksi
include 'koneksi.php';

//fungsi untuk mencegah inputan karakter yang tidak sesuai
include 'cekinput.php';

//menangkap data yang dikirim dari form
$username = input($_POST['username']);
$password = input($_POST['password']);

//menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:../dashboard.php");
}else{
    header("location:../index.php?pesan=gagal");
}
?>