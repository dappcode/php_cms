<?php 
    include "../../../inc/config.php";

    if(!empty($_POST['kategori'])) {
        // Proses simpan 
        $sql = "INSERT INTO kategori (nm_kategori) VALUES ('$_POST[kategori]')";
        $result = mysqli_query($dblogin, $sql);

        header('location:../../dashboard.php?m=kategori');
    } else {
        header('location:../../dashboard.php?m=kategori');
    }
