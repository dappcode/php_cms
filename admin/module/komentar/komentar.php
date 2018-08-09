<?php 
    if (isset($_GET['tipe'])) {
        if($_GET['tipe'] == 'edit') {
            $query="SELECT * FROM komentar WHERE id='$_GET[id]'";
            $sql= mysqli_query($dblogin, $query);

            $de = mysqli_fetch_array($sql);
            echo "
                <h3> Edit Data Komentar </h3>
                <form method='post' action='module/komentar/proses_edit.php'>
                    <input type='hidden' name='id' value='$de[id]'>
                    <label> Status Aktif </label>
                    <select name='aktif'>
                        <option value='$de[aktif]' selected> $de[aktif] </option>
                        <option value='Y'> Y </option>
                        <option value='N'> N </option>
                    </select>
                    <br>
                    <label> &nbsp; </label>
                    <input type='submit' value='Save Changes'>
                    <input type='button' value='cancel' onClick='history.back()'>
                </form>";
        }
    } else {
?>
        <h3> Manajemen Komentar</h3>        
        <table border="1" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Isi Komentar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php 
                $query = "SELECT * FROM komentar ORDER BY id DESC";
                $sql = mysqli_query($dblogin, $query);

                $no = 1;
                while($k=mysqli_fetch_array($sql)) {
                    echo 
                    "<tr>
                        <td align='center'> $no </td>
                        <td> $k[nama] </td>
                        <td> $k[komentar] </td>
                        <td> $k[aktif] </td>
                        <td align='center' width='140px'>
                            <a href='?m=komentar&tipe=edit&id=$k[id]'> Edit </a> | 
                            <a href='module/komentar/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda Yakin akan menghpusnya?\")'>Hapus</a>
                        </td>
                    </tr>
                    ";
                    $no++;
                }
            ?>
        
        </table>
<?php
    }
    