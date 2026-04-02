<?php
    //mengaktifkan session php
    session_start();

    //menghapus semua session
    $_SESSION['status']= '';
    $_SESSION['username']= '';

    unset($_SESSION['status']);
    unset($_SESSION['username']);

    session_unset();
    session_destroy();

    //mengembalikan halaman sambil mengirimkan pesan logout
    header("location:index.php?pesan=logout");

?>