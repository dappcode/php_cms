<?php 

include "./inc/config.php";

$tgl = date("Y-m-d");
$idberita = $_POST['idberita'];
$query = "INSERT INTO komentar (nama,email,komentar,tgl,id_berita) VALUES ('$_POST[nama]','$_POST[email]','$_POST[isi]', '$tgl', '$idberita')";
$sqlSimpan = mysqli_query($dblogin, $query);

if ($sqlSimpan) {
    header('Location:.?hal=berita&id='.$idberita);
} else {
    echo "data tidak masuk";
}
