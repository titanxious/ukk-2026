<?php 

    //koneksi ke database
    include '../jembatan/koneksi.php';
    //fungsi untuk mengecek inputan karakter yang tidak sesuai
    include '../jembatan/cekinput.php';

    //menangkap data yang dikirim dari form
    $nis = input($_POST['nis']);
    $nama = input($_POST['nama']);
    $kelas = input($_POST['kelas']);
    $alamat = input($_POST['alamat']);

    //menginput data ke database
    mysqli_query($koneksi, "insert into siswa values('','$nis','$nama','$kelas','$alamat')");

    //kembalikan ke halaman dashboard
    header("location:../dashboard.php?pesan=tersimpan");
?>