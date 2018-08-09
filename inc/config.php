<?php   

// Variabel untuk koneksi
$host = "localhost";
$dbuser = "root";
$dbpass = "1";
$dbname = "php_cms";

// menggunakan fungsi untuk melakukan koneksi database
$dblogin = mysqli_connect($host, $dbuser, $dbpass, $dbname) or die ("koneksi ke MYSQL Gagal!");

