<?php 
include '../core/init.php';
$auth->checkIsLogin();
$error = isset($_POST['login']) ? $auth->login($_POST) : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <center>
        <h1>Selamat Datang Kembali</h1>
        <?php if(isset($error)): ?>
            <p style="color:red;"><?= $error; ?></p>
        <?php endif ?>
        <form action="" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukan username..." required><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukan password..." required><br>

            <label for="remember">Remember Me</label>
            <input type="checkbox" name="remember" id="remember"><br>

            <button type="submit" name="login">Login</button>
        </form>
    </center>
</body>
</html>