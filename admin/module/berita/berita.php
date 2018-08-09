<?php 
    if (isset($_GET['tipe'])) {
        if ($_GET['tipe'] == 'tambah') {
            echo "
                <h3> Tambah Data Berita </h3>
                <form method='post' action='module/berita/proses_tambah.php'>
                    <table width='100%'>
                        <tr>
                            <td> Judul Berita </td>
                            <td> <input type='text' name='judul' size='100'> </td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td> 
                                <select name='kategori'>
                                    <option selected> Choose Category </option>
                                ";
                                $sql = mysqli_query($dblogin, "SELECT * FROM kategori ORDER BY nm_kategori ASC");
                                while($k=mysqli_fetch_array($sql)) {
                                    echo "<option value='$k[id]'>$k[nm_kategori]</option>";
                                }
                                echo "
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td valign='top'> Isi Berita </td>
                            <td> 
                                <textarea name='isi' id='editor1'></textarea>
                            </td>
                        </tr> 
                        <tr>
                            <td></td>
                            <td> 
                                <input type='submit' value='Save'>
                                <input type='button' value='cancel' onClick='history.back()'>
                            </td>
                        </tr> 
                    </table>
                </form>";
        } elseif($_GET['tipe'] == 'edit') {
            $query="SELECT * FROM berita WHERE id='$_GET[id]'";
            $sql= mysqli_query($dblogin, $query);

            $de = mysqli_fetch_array($sql);
            echo "
                <h3> Edit Data Berita </h3>
                <form method='post' action='module/berita/proses_edit.php'>
                <input type='hidden' name='id' value='$de[id]'>
                <table width='100%'>
                <tr>
                    <td> Judul Berita </td>
                    <td> <input type='text' name='judul' size='100' value='$de[judul]'> </td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td> 
                        <select name='kategori'>
                            <option> Choose Category </option>
                        ";
                        $sql = mysqli_query($dblogin, "SELECT * FROM kategori ORDER BY nm_kategori ASC");
                        while($k=mysqli_fetch_array($sql)) {
                            echo "<option value='$k[id]'";
                                if($de['id_kategori'] === $k['id']) {
                                echo 'selected'; } 
                        echo ">$k[nm_kategori]</option>";
                        }
                        echo "
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign='top'> Isi Berita </td>
                    <td> 
                        <textarea name='isi' id='editor1'> $de[isi] </textarea>
                    </td>
                </tr> 
                <tr>
                    <td></td>
                    <td> 
                        <input type='submit' value='Save Changes'>
                        <input type='button' value='cancel' onClick='history.back()'>
                    </td>
                </tr> 
            </table>
                </form>";
        }
    } else {
?>
        <h3> Manajemen Berita</h3>
        <a href="?m=berita&tipe=tambah"> Tambah Data </a>
        <table border="1" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
            <?php 
                $query = "SELECT * FROM berita ORDER BY id ASC";
                $sql = mysqli_query($dblogin, $query);

                $no = 1;
                while($k=mysqli_fetch_array($sql)) {
                    echo 
                    "<tr>
                        <td align='center'> $no </td>
                        <td> $k[judul] </td>
                        <td align='center' width='140px'>
                            <a href='?m=berita&tipe=edit&id=$k[id]'> Edit </a> | 
                            <a href='module/berita/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda Yakin akan menghpusnya?\")'>Hapus</a>
                        </td>
                    </tr>
                    ";
                    $no++;
                }
            ?>
        
        </table>
<?php
    }
    