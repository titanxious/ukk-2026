<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 6 Kupang</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <div class="login-card">
        <h2>Login Form</h2>
        <form method="post" action="jembatan/ceklogin.php">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" id="username" name="username" placeholder="Masukan Username" require>
            </div>  

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukan Password" require>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
        <p>Belum Punya Akun <a href="#">Daftar</p>
    </div>

</body>
</html>