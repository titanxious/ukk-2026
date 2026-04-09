<?php
session_start();
include 'koneksi.php';

$username = $_POST['Username'];
$password = $_POST['Password'];

$data = mysqli_query($koneksi, 
    "SELECT * FROM users WHERE username='$username' AND password='$password'"
);

$cek = mysqli_num_rows($data);

if($cek > 0){

    $user = mysqli_fetch_assoc($data);

    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['status'] = "login";

    // 🔥 cek role
    if($user['role'] == 'admin'){
        header("Location: admin.php");
    } else {
        header("Location: users.php");
    }

} else {
    header("Location: index.php?pesan=gagal");
}
?>