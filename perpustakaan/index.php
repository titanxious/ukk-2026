<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-card">
    <h2> Login </h2>
    <form action="cek_login.php" method="post">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="Username" placeholder="Username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="Password" placeholder="Password" required>
        </div>

        <button type="submit" class="btn">Login</button>
    </form>
    <p>Belum punya akun? <a href="#">Daftar</a></p>
</div>
</body>
</html>