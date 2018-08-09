<?php 
include "../../../inc/config.php";

if(!empty($_POST['kategori'])) {
    $sql = "UPDATE kategori SET nm_kategori='$_POST[kategori]' WHERE id='$_POST[id]'";
    $result = mysqli_query($dblogin, $sql);
    
    header('location:../../dashboard.php?m=kategori');
} else {
    header('location:../../dashboard.php?m=kategori');    
}