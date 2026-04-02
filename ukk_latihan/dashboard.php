<?php
    session_start();
    error_reporting(0);
    include 'jembatan/koneksi.php';
?>

<?php
    if($_SESSION['status']!=="login"){
        header("location: index.php?pesan=belum_login");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 6 Kupang</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="#">data siswa</a></li>
            <li><a href="#">galery</a></li>

            <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>logout
            </a>
        </ul>
    </nav>

    <?php 
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    $data = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' ORDER BY id_admin DESC");
    while($d = mysqli_fetch_array($data)){
    ?>

    <p align="center">Selamat Datang : <?PHP echo $d['nama_lengkap']; ?></p>
    <hr>


    <?php } ?>


    <div class="container">
        <div class="form-section">
            <h2>Form Input Siswa</h2>
            <form method="post" action="insert/insertsiswa.php">
                <label for="nis">NIS :</label>
                <input type="text" id="nis" name="nis" required>

                <label for="nama">Nama Siswa :</label>
                <input type="text" id="nama" name="nama" required>

                <label for="kelas">Kelas :</label>
                <select name="kelas" id="kelas" require>
                    <option value="">--Pilih Kelas--</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>

                <label for="alamat">Alamat :</label>
                <textarea name="alamat" id="alamat" rows="3" require></textarea>

                <button type="submit">Simpan</button>
            </form>
        </div>

        <div class="output-section">
            <h2>Data Siswa</h2>
            <table id="datatabel">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Bagian Isi Data Siswa-->
                    <?php 
                    $data = mysqli_query($koneksi, "select * from siswa");
                    while($d = mysqli_fetch_array($data)){
                    ?>

                        <tr>
                            <td><?php echo $d['nis']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['kelas']; ?></td>
                            <td><?php echo $d['alamat']; ?></td>
                            <td>
                                <a href="delete/deletesiswa.php?id_siswa=<?= $d['id_siswa']; ?>"onclick="return confirm('ngana yakin mau hapus..?');" href="#"><i class="fas fa-trash" style='color:red'></i></a></a>
                                <a href="#"><i class="fas fa-edit" style='color:blue'></i></a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>