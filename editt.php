<?php
    include('koneksi.php');
    $submit = isset($_POST["siswa_submit"])?$_POST["siswa_submit"]:"";
    if($submit){
            $sql = "
            UPDATE siswa SET

            ";
            $result = $db->query($sql); // Execute Query SQL

            if($result){
            echo "
            <script>
            alert('Data berhasil ditambahkan !');
            window.location = 'siswa.php';
            </script>
            ";
            }else{
            echo "
            <script>
            alert('Data gagal ditambahkan !');
            window.location = 'siswa_tambah.php';
            </script>
            ";
            }

        }
    $id_siswa = isset($_GET["id"])?$_GET["id"]:"";

    $sql = "SELECT * FROM siswa WHERE id_siswa = '".$id_siswa."'"; //query sql
    $result = $db->query($sql); //execute query sql
    if( $result->num_rows >= 1){
        $row = $result->fetch_assoc();
    }else{
        die();
    }
?>

<h1>Tambah Edit siswa XI RPL 1</h1>
<form action="siswa_edit.php?id=<?php echo $id_siswa; ?>" method="POST">
    <input type="hidden" name="id_siswa" value="<?php echo $row["id_siswa"];?>"/>
    <div>
        <label>NIS</label><br>
        <input type="text" name="nis" required="required" value="<?php echo $row["nis"];?>"/><br>
    </div>
    <div>
        <label>Nama Lengkap</label><br>
        <input type="text" name="nama_lengkap" required="required" value="<?php echo $row["nama_lengkap"];?>"/><br> 
   </div>
    <div>
        <label>Jenis Kelamin</label><br>
        <?php
            $l = "";
            $p = "";
            
            if($row["jk"] == "L"){
            $l = "selected";
            }else if($row["jk"] == "P"){
            $p = "selected";
       
        ?>
         <select name="jk" required="required">
        <option value="">- Pilih Jenis Kelamin -</option>
        <option value="L" <?php echo $l; ?>>Laki-laki</option>
        <option value="P" <?php echo $p; ?>>Perempuan</option>
        <option value="-">Lainnya</option>
        </select><br>
    </div> 
      
    <div>
        <label>Tempat Lahir</label><br>
        <input type="text" name="tmp_lahir" required="required" value="<?php echo $row["tmp_lahir"];?>"/><br>
    </div> 
    <div>
        <label>Tanggal Lahir</label><br>
        <input type="text" name="tgl_lahir" required="required" placeholder="YYYY-MM-DD"
        value="<?php echo $row["tgl_lahir"];?>"/><br>
    </div>

    <div>
        <label>Alamat</label><br>
        <textarea name="alamat" required="required"><?php echo $row["alamat"];?></textarea><br>
    </div>

    <div>
        <label>Nomor HP</label><br>
        <input type="text" name="no_hp" required="required"
        value="<?php echo $row["no_hp"];?>"/><br>
    </div>
    <br>
        <input type="submit" name="siswa_submit" value="Simpan"/>
</form>