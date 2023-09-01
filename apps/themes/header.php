<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $url->getTitle(); ?></title>
</head>
<body>
    <center>
        <a href="index.php">Home</a> | 
        <?php if($_SESSION['level'] === 'Admin'): ?>
            <a href="index.php?p=kelas">Kelas</a> | 
            <a href="index.php?p=spp">Spp</a> | 
            <a href="index.php?p=siswa">Siswa</a> | 
            <a href="index.php?p=petugas">Petugas</a> |
        <?php endif ?> 

        <?php if($_SESSION['level'] === 'Admin' || $_SESSION['level'] == 'Petugas'): ?>
            <a href="index.php?p=pembayaran">Pembayaran</a> | 
        <?php endif ?> 
        <a href="index.php?p=logout">Logout</a>
