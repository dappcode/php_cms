<?php 
    if (isset($_GET['tipe'])) {
        if ($_GET['tipe'] == 'tambah') {
            echo "
                <h3> Tambah Data Kategori </h3>
                <form method='post' action='module/kategori/proses_tambah.php'>
                    <label> Nama Kategori </label>
                    <input type='text' name='kategori' size='40'> <br>
                    <label> &nbsp; </label>
                    <input type='submit' value='Save'>
                    <input type='button' value='cancel' onClick='history.back()'>
                </form>";
        } elseif($_GET['tipe'] == 'edit') {
            $query="SELECT * FROM kategori WHERE id='$_GET[id]'";
            $sql= mysqli_query($dblogin, $query);

            $de = mysqli_fetch_array($sql);
            echo "
                <h3> Edit Data Kategori </h3>
                <form method='post' action='module/kategori/proses_edit.php'>
                    <input type='hidden' name='id' value='$de[id]'>
                    <label> Nama Kategori </label>
                    <input type='text' name='kategori' size='40' value='$de[nm_kategori]'> <br>
                    <label> &nbsp; </label>
                    <input type='submit' value='Save'>
                    <input type='button' value='cancel' onClick='history.back()'>
                </form>";
        }
    } else {
?>
        <h3> Manajemen Kategori</h3>
        <a href="?m=kategori&tipe=tambah"> Tambah Data </a>
        <table border="1" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
            <?php 
                $query = "SELECT * FROM kategori ORDER BY nm_kategori ASC";
                $sql = mysqli_query($dblogin, $query);

                $no = 1;
                while($k=mysqli_fetch_array($sql)) {
                    echo 
                    "<tr>
                        <td align='center'> $no </td>
                        <td> $k[nm_kategori] </td>
                        <td align='center' width='140px'>
                            <a href='?m=kategori&tipe=edit&id=$k[id]'> Edit </a> | 
                            <a href='module/kategori/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda Yakin akan menghpusnya?\")'>Hapus</a>
                        </td>
                    </tr>
                    ";
                    $no++;
                }
            ?>
        
        </table>
<?php
    }
    