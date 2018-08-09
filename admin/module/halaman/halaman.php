<?php 
    if (isset($_GET['tipe'])) {
       if($_GET['tipe'] == 'edit') {
            $query="SELECT * FROM halaman WHERE id='$_GET[id]'";
            $sql= mysqli_query($dblogin, $query);

            $de = mysqli_fetch_array($sql);
            echo "
                <h3> Edit Data Berita </h3>
                <form method='post' action='module/halaman/proses_edit.php'>
                <input type='hidden' name='id' value='$de[id]'>
                <table width='100%'>
                <tr>
                    <td> Judul Halaman Statis </td>
                    <td> <input type='text' name='judul' size='100' value='$de[judul]'> </td>
                </tr>
                <tr>
                    <td valign='top'> Isi Halaman Statis </td>
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
        <h3> Manajemen Halaman Statis</h3>
        <table border="1" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
            <?php 
                $query = "SELECT * FROM halaman ORDER BY id ASC";
                $sql = mysqli_query($dblogin, $query);

                $no = 1;
                while($k=mysqli_fetch_array($sql)) {
                    echo 
                    "<tr>
                        <td align='center'> $no </td>
                        <td> $k[judul] </td>
                        <td align='center' width='140px'>
                            <a href='?m=halaman&tipe=edit&id=$k[id]'> Edit </a>
                        </td>
                    </tr>
                    ";
                    $no++;
                }
            ?>
        
        </table>
<?php
    }
    