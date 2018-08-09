<?php 

if(isset($_GET['m'])) {
    if($_GET['m'] == 'kategori') {
        include "module/kategori/kategori.php";
    } elseif($_GET['m'] == 'berita') {
        include "module/berita/berita.php";
    } elseif($_GET['m'] == 'halaman') {
        include "module/halaman/halaman.php";
    } elseif($_GET['m'] == 'komentar') {
        include "module/komentar/komentar.php";
    } else {
        echo "<h3> Module tidak di temukan </h3> <p> Silahkan Pilih menu yang lain! </p>";
    }
} else {
    echo "<h3> Selamat Datang Administrator </h3> <p> Anda Login Sebagai $_SESSION[nama] </p>";
} 
