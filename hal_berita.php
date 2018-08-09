<?php 

if(isset($_GET['id'])) {
    // tampilkan detail berita 
    $sqlDetail = mysqli_query($dblogin, "SELECT berita.*, kategori.nm_kategori,user.nama_lengkap FROM berita INNER JOIN kategori ON berita.id_kategori = kategori.id
    INNER JOIN user on berita.id_user = user.id WHERE berita.id='$_GET[id]'");
    $dbrt = mysqli_fetch_array($sqlDetail);
?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $dbrt['judul']; ?></h3>
        </div>
        <div class="panel-body">
            <?php echo $dbrt['isi']; ?>
        </div>
        <div class="panel-footer">
            <span> Ditulis oleh : <?php echo $dbrt['nama_lengkap']; ?></span>
            <span class="pull-right"> Di Posting pada : <?php echo $dbrt['tgl']; ?></span>
        </div>
    </div>
    <!-- tampil komentar -->
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"> Semua Komentar </h3>
        </div>
        <div class="panel-body">
            <ul class="media-list">
            <?php 
            $sqlKomen = mysqli_query($dblogin, "SELECT * FROM komentar WHERE id_berita='$dbrt[id]' AND aktif='Y' ORDER BY id DESC");
            while($k=mysqli_fetch_array($sqlKomen)) {
            ?>
                <li class="media" style="border-bottom: 1px solid grey; padding-bottom: 10px;">
                    <div class="media-body">
                        <h4><a href="mailto:<?php echo $k['email']; ?>"><?php echo $k['nama'];?></a></h4>
                        <?php echo $k['komentar']; ?> 
                        [<?php echo $k['tgl']; ?>]
                    </div>
                </li>
            <?php
            }
            ?>
            </ul>
        </div>
    </div>

    <!-- form komentar -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Tinggalkan Pesan Anda...
            </h3>
        </div>
        <div class="panel-body">
            <form action="simpan_komentar.php" method="post">
                <input type="hidden" name="idberita" value="<?php echo $dbrt['id']; ?>">
                <div class="form-group">
                    <label for="nama">Nama Anda</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email Anda</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="isi">Isi Komentar Anda</label>
                    <textarea name="isi" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Simpan Komentar </button>
                </div>
            </form>
        </div>
    </div>

<?php

} elseif (isset($_GET['ktg'])) {
    // tampilkan berita berdasarkan 
    $sqlKategori = mysqli_query($dblogin, "SELECT * FROM kategori WHERE id='$_GET[ktg]'");
    $ktg = mysqli_fetch_array($sqlKategori);
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Berita <b> <?php echo $ktg['nm_kategori']; ?> </b></h3>
        </div>
        <div class="panel-body">
            <ul>
                <?php 
                $query = "SELECT * FROM berita WHERE id_kategori='$_GET[ktg]' ORDER BY id DESC";
                $sqlBerita = mysqli_query($dblogin, $query);
                while($k=mysqli_fetch_array($sqlBerita)) {
                    echo "
                    <li><a href='./?hal=berita&id=$k[id]'>$k[judul]</a></li>            
                    ";
                }
                ?>
            </ul>
        </div>
        
    </div>
    <?php
} else {
    // tampilkan daftar berita
?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Berita Terkini</h3>
        </div>
        <div class="panel-body">
            <ul>
                <?php 
                $query = "SELECT * FROM berita ORDER BY id DESC";
                $sqlBerita = mysqli_query($dblogin, $query);
                while($k=mysqli_fetch_array($sqlBerita)) {
                    echo "
                    <li><a href='./?hal=berita&id=$k[id]'>$k[judul]</a></li>            
                    ";
                }
                ?>
            </ul>
        </div>
        
    </div>
<?php
}