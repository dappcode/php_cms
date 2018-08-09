<?php 
include "../../../inc/config.php";

// proses Hapus
$sql = "DELETE FROM komentar WHERE id='$_GET[id]'";
$result = mysqli_query($dblogin, $sql);

header('location:../../dashboard.php?m=komentar');
