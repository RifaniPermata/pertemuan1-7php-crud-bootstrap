<?php
include('koneksi.php')
   
?>
<div class="container">
<h1>DAFTAR SISWA SMKN 1 SUBANG </h1><br>
<a href="siswa_tambah.php" class="btn btn-primary">Tambah data</a><br><br>
<table id="tabel_siswa" class="table table-bordered table-striped table-hover">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>NAMA</th>
            <th>JK</th>
            <th>Tempat lahir</th>
            <th>Tanggal lahir</th>
            <th>alamat</th>
            <th >No Hp</th>
            <th>tanggal_entri</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            //pengambilan data dari database mysql yang sudah terkoneksi
            $sql = "SELECT * FROM siswa;"; //query sql
            $result = $db->query($sql); //execute query sql
            $id_siswa = 1;
            while( $row = $result->fetch_assoc()) 
        {
            echo "
                <tr>
                    <td>".$id_siswa."</td>
                    <td>".$row ["nama_lengkap"] ."</td>
                    <td>".$row ["jk"] ."</td>
                    <td>".$row ["tmp_lahir"] ."</td>
                    <td>".$row ["tgl_lahir"] ."</td>
                    <td>".$row ["alamat"  ] ."</td>
                    <td>".$row ["no_hp"] ."</td>
                    <td>".$row ["tanggal_entri"] ."</td>
                    <td> 
                        <a href = 'siswa_edit.php?id=".$row ["id_siswa"]."' class='btn btn-success btn-sm'>edit</a>
                        -
                        <a href = 'siswa_hapus.php?id=".$row ["id_siswa"]."' onclick='return confirm(\"Yakin dihapus ?\");'
                        class='btn btn-danger btn-sm'>hapus</a>

                    </td>
                </tr>
            ";
            $id_siswa++;
        }
        ?>
    </tbody>
</table>
</div>