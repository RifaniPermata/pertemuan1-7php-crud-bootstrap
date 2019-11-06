<head>
    <title>CRUD siswa PHP</title>
    <meta name="viewport" content="width=device=width, initial-scale=1, shring-to-fit=no">

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery-3.3.1.js"></script>
    <script src="./assets/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#tabel_siswa').DataTable();
        });
    </script>


</head>
<?php
    // membuat koneksi php ke database
    //mysqli(source, username, password, nama_db)

    $db = new mysqli("localhost", "root", "", "11rpl1_db");
    if (mysqli_connect_errno()){
        echo "Error : " . mysqli_connect_error();
    }else{
        //echo "success";
    }

?>