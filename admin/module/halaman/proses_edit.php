<?php 
include "../../../inc/config.php";

if(!empty($_POST['judul'])) {
    $sql = "UPDATE halaman SET judul='$_POST[judul]', isi='$_POST[isi]' WHERE id='$_POST[id]'";
    $result = mysqli_query($dblogin, $sql);
    
    header('location:../../dashboard.php?m=halaman');
} else {
    header('location:../../dashboard.php?m=halaman');    
}