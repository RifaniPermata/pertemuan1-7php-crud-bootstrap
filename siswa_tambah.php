<?php
    include("koneksi.php");
    $submit = isset($_POST["siswa_submit"])? $_POST["siswa_submit"]:"";
    if($submit){
        $sql = "
            INSERT INTO siswa
            (`id_siswa`,`nis`,`nama_lengkap`,`jk`,`tmp_lahir`,  `tgl_lahir`,
            `alamat`,`no_hp`,`tanggal_entri`)
            VALUES(
                    NULL,
                    '".$_POST["nis"]."',
                    '".$_POST["nama_lengkap"]."',
                    '".$_POST["jk"]."',
                    '".$_POST["tmp_lahir"]."',
                    '".$_POST["tgl_lahir"]."',
                    '".$_POST["alamat"]."',
                    '".$_POST["no_hp"]."',
                    NOW()

            );
        ";
        $result = $db-> query ($sql);
        if(result){
            echo"
                <script>
                alert('Data berhasil ditambahkan!');
                window.location ='siswa.php';
                </script>
            ";
        }else{
            echo"
                <script>
                alert('Data gagal ditambahkan!');
                window.location ='siswa_tambah.php';
                </script>
                ";
        }
    }
    /*if($submit){
        echo "Clicked!";
    }else{
        echo "ERROR - NO Click Submit!";
    }*/
?>
<div class="container">
<h1>Tambah Data siswa XI RPL 1</h1>
<form action="siswa_tambah.php" method="POST">
    <div class="form-group">
        <label>NIS</label><br>
        <input class="form-control" type="text" name="nis" required="required"/>
    </div>
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input class="form-control" type="text" name="nama_lengkap" required="required"/> 
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select class="form-control" name="jk">
            <option value="">- Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
            <option value="Value">Lainnya</option>
         </select>
    </div> 
    <div class="form-group">
        <label>Tempat Lahir</label>
        <input class="form-control" type="text" name="tmp_lahir" required="required" > 
    </div>    
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input class="form-control" type="text" name="tgl_lahir" required="required" placeholder="YYYY-MM-DD"/> 
    </div>    
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" required="required"></textarea>
    </div>
    <div class="form-group">
        <label>Nomor Hp</label>
        <input class="form-control" type="text" name="no_hp" required="required"> <br>
  
    <input class="btn btn-primary" type="submit" name="siswa_submit" value="simpan">

</form>
</div>