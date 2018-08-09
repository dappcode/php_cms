<?php 
include "./inc/config.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/icon.png">

    <title>Halaman CMS ku</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-custom navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CMS SEDERHANA KU</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="./">Home</a></li>
            <li><a href="./?hal=profil">Profile</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Layanan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?hal=layanan-web">Pembuatan Web</a></li>
                <li><a href="./?hal=layanan-company-profile">Pembuatan Company Profile</a></li>
                <li><a href="./?hal=layanan-training">Training</a></li>
              </ul>
            </li>
            <li><a href="./?hal=berita">Berita</a></li>
            <li><a href="./?hal=kontak">Kontak Kami</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./admin/">Administrator</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php 
                if(isset($_GET['hal'])) {
                    if($_GET['hal'] == 'profil') {
                        $query = "SELECT * FROM halaman WHERE id='1'";
                        $sql = mysqli_query($dblogin, $query);
                        $result = mysqli_fetch_array($sql);
                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?php echo $result['judul']; ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $result['isi']; ?>                    
                            </div>
                        </div>
                        <?php
                    } elseif($_GET['hal'] == 'layanan-web') {
                        $query = "SELECT * FROM halaman WHERE id='2'";
                        $sql = mysqli_query($dblogin, $query);
                        $result = mysqli_fetch_array($sql);
                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?php echo $result['judul']; ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $result['isi']; ?>                    
                            </div>
                        </div>
                        <?php

                    } elseif($_GET['hal'] == 'layanan-company-profile') {
                        $query = "SELECT * FROM halaman WHERE id='3'";
                        $sql = mysqli_query($dblogin, $query);
                        $result = mysqli_fetch_array($sql);
                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?php echo $result['judul']; ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $result['isi']; ?>                    
                            </div>
                        </div>
                        <?php

                    } elseif($_GET['hal'] == 'layanan-training') {
                        $query = "SELECT * FROM halaman WHERE id='4'";
                        $sql = mysqli_query($dblogin, $query);
                        $result = mysqli_fetch_array($sql);
                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?php echo $result['judul']; ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $result['isi']; ?>                    
                            </div>
                        </div>
                        <?php

                    } elseif($_GET['hal'] == 'kontak') {
                        $query = "SELECT * FROM halaman WHERE id='5'";
                        $sql = mysqli_query($dblogin, $query);
                        $result = mysqli_fetch_array($sql);
                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?php echo $result['judul']; ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $result['isi']; ?>                    
                            </div>
                        </div>
                        <?php

                    } elseif ($_GET['hal'] == 'berita') {
                        include "hal_berita.php";
                    }
                } else {
                    $query = "SELECT * FROM halaman WHERE id='6'";
                    $sql = mysqli_query($dblogin, $query);
                    $result = mysqli_fetch_array($sql);
                ?>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php echo $result['judul']; ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $result['isi']; ?>                    
                    </div>
                </div>
                <?php
                }
                
                ?>
            </div>
            <div class="col-md-4">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Kategori Berita
                        </h3>   
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <?php 
                            $query = "SELECT * FROM kategori";
                            $sqlKategori = mysqli_query($dblogin, $query);
                            while($k=mysqli_fetch_array($sqlKategori)){
                                ?>  
                                <li>
                                    <a href="./?hal=berita&ktg=<?php echo $k['id']; ?>">
                                    <span class="glyphicon glyphicon-th-large"></span>
                                    <?php echo $k['nm_kategori'];?></a>
                                </li>
                                <?php
                            }
                            
                            ?>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <center> Copyright &copy; 2018 </center>
        </div>

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
