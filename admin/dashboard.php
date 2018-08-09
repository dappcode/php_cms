<?php 
session_start();

if(!isset($_SESSION['login'])) {
    header('location:index.php');
}

include "../inc/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    

    <title>Halaman Home Administrator</title>
</head>
<body>
    <table width="100%">
        <tr>
            <td colspan="2" bgcolor="#ebebeb">
                <h1>Contetnt Management System</h1>
            </td>
        </tr>
        <tr>
            <td valign="top" width="250px" bgcolor="#ebebeb">
                <div class="menu">
                    <ul>
                        <li><a href="./dashboard.php">Home</a></li>
                        <li><a href="./dashboard.php?m=kategori">Manajamen Kategori</a></li>
                        <li><a href="./dashboard.php?m=berita">Manajamen Berita</a></li>
                        <li><a href="./dashboard.php?m=komentar">Manajamen Komentar</a></li>
                        <li><a href="./dashboard.php?m=halaman">Manajamen Halaman</a></li>
                        <li><a href="./dashboard.php?m=pegawai">Data Pegawai</a></li>
                        <li><a href="./logout.php">Logout</a></li>
                    </ul>
                </div>
            </td>
            <td valign="top">
                <div class="content">
                    <?php include "content.php"; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" bgcolor="#ebebeb">Copyright &copy; 2018 CMS ku </td>
        </tr>
    
    </table>
    <script src="../assets/ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('editor1', {
        filebrowserImageBrowseUrl: '../assets/kcfinder'
    });
    </script>
</body>
</html>