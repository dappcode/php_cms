<?php 
include "../../../inc/config.php";

if(!empty($_POST['aktif'])) {
    $sql = "UPDATE komentar SET aktif='$_POST[aktif]' WHERE id='$_POST[id]'";
    $result = mysqli_query($dblogin, $sql);
    
    header('location:../../dashboard.php?m=komentar');
} else {
    header('location:../../dashboard.php?m=komentar');    
}