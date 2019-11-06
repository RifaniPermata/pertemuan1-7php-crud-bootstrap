<?php
	include('koneksi.php');
	$id_siswa = $_GET['id'];
		$sql = "DELETE FROM siswa WHERE id_siswa = '".$id_siswa."'";
		$result = $db->query($sql);
		
    header("location:siswa.php?pesan=hapus");
    
if($result){
    echo "
    <script>
    alert('Data berhasil ubah !');
    window.location = 'siswa.php';
    </script>
    ";
    }else{
    echo "
    <script>
    alert('Data gagal ditambahkan !');
    window.location = 'siswa_edit.php';
    </script>
    ";
    }
    ?>