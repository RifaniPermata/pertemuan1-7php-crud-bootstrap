<?php
include('koneksi.php');
$id = $_GET['id'];
$sql = "SELECT * FROM siswa WHERE id_siswa = '".$id."'";
$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result);
mysqli_free_result($result);
$submit = isset($_POST["siswa_submit"])?$_POST["siswa_submit"]:"";
if($submit){
   $nis= $_POST["nis"];
   $nama = $_POST["nama_lengkap"];
   $jk = $_POST["jk"];
    $tmp_lahir =$_POST["tmp_lahir"];
  $tgl_lahir =  $_POST["tgl_lahir"];
   $alamat = $_POST["alamat"];
  $no_hp =  $_POST["no_hp"];
$sql = "
UPDATE siswa SET
nis ='".$nis."',
nama_lengkap = '".$nama."',
jk = '".$jk."',
tmp_lahir = '".$tmp_lahir."',
tgl_lahir = '".$tgl_lahir."',
alamat = '".$alamat."',
no_hp = '".$no_hp."',
tanggal_entri = '".$row["tanggal_entri"]."'
where id_siswa = '".$id."'
;";
$result = $db->query($sql); // Execute Query SQL

if($result){
echo "
<script>
alert('Data berhasil ubah !');
window.location = 'siswa.php';
</script>
";
}else{
echo  $sql;
}
}

$id_siswa = isset($_GET["id"])?$_GET["id"]:"";
$sql = "SELECT * FROM siswa WHERE id_siswa = '".$id_siswa."'";
$result = $db->query($sql);
if($result->num_rows >= 1){
$row = $result->fetch_assoc();
}else{
die();
}
?>
<div class="container">
<h1>Edit Data Siswa XI RPL 1</h1>

<form action="siswa_edit.php?id=<?php echo $id_siswa; ?>" method="POST">
<input type="hidden" name="id_siswa" value="<?php echo $row["id_siswa"];?>"/>
<div class="form-group">
<label>NIS</label>
<input class="form-control" type="text" name="nis" required="required"
value="<?php echo $row["nis"];?>"/>
</div>

<div class="form-group">
<label>Nama Lengkap</label>
<input class="form-control" type="text" name="nama_lengkap" required="required"
value="<?php echo $row["nama_lengkap"];?>"/>
</div>

<div class="form-group">
<label>Jenis Kelamin</label>
<?php
$l = "";
$p = "";

if($row["jk"] == "L"){
$l = "selected";
}else if($row["jk"] == "P"){
$p = "selected";
}
?>
<select class="form-control" name="jk" required="required">
<option value="">- Pilih Jenis Kelamin -</option>
<option value="L" <?php echo $l; ?>>Laki-laki</option>
<option value="P" <?php echo $p; ?>>Perempuan</option>
<option value="-">Lainnya</option>
</select>
</div>

<div class="form-group">
<label>Tempat Lahir</label>
<input class="form-control" type="text" name="tmp_lahir" required="required"
value="<?php echo $row["tmp_lahir"];?>"
/>
</div>

<div class="form-group">
<label>Tanggal Lahir</label>
<input class="form-control" type="text" name="tgl_lahir" required="required" placeholder="YYYY-MM-DD"
value="<?php echo $row["tgl_lahir"];?>"/>
</div>

<div class="form-group">
<label>Alamat</label>
<textarea class="form-control" name="alamat" required="required"><?php echo $row["alamat"];?></textarea>
</div>

<div class="form-group">
<label>Nomor HP</label><br>
<input class="form-control" type="text" name="no_hp" required="required"
value="<?php echo $row["no_hp"];?>"/>
</div>

<input class="btn btn-primary" type="submit" name="siswa_submit" value="Simpan"/>

</form>
</div>