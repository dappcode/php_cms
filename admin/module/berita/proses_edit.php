<?php 
include "../../../inc/config.php";

if(!empty($_POST['judul'])) {
    $sql = "UPDATE berita SET id_kategori='$_POST[kategori]', judul='$_POST[judul]', isi='$_POST[isi]' WHERE id='$_POST[id]'";
    $result = mysqli_query($dblogin, $sql);
    
    header('location:../../dashboard.php?m=berita');
} else {
    header('location:../../dashboard.php?m=berita');    
}