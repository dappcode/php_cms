<?php 
include "../../../inc/config.php";

if(!empty($_GET['id'])) {
    // proses Hapus
    $sql = "DELETE FROM berita WHERE id='$_GET[id]'";
    $result = mysqli_query($dblogin, $sql);

    header('location:../../dashboard.php?m=berita');
} else {
    header('location:../../dashboard.php?m=berita');    
}
