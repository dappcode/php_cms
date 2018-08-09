<?php 
session_start();
include "../../../inc/config.php";

if(!empty($_POST['judul'])) {
    $tgl        = date("Y-m-d");
    $id_user    = $_SESSION['id'];
    // Proses simpan 
    $sql = "INSERT INTO berita (id_kategori,judul,isi,tgl,id_user) VALUES ('$_POST[kategori]','$_POST[judul]','$_POST[isi]', '$tgl','$id_user')";
    $result = mysqli_query($dblogin, $sql);
    
    header('location:../../dashboard.php?m=berita');
} else {
    header('location:../../dashboard.php?m=berita');
    die("masuk sini");
}
