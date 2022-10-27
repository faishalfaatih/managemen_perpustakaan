<?php

include "../../../../koneksi.php";

$no_petugas = $_POST ['no_petugas'];
$nama_petugas = $_POST ['nama_petugas'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$ulang_pass = $_POST ['ulang_pass'];

if ($password == $ulang_pass) {
    $pass_ok = md5($password);
    $proses = mysqli_query($koneksi,"UPDATE tab_petugas SET 
    nama_petugas = '$nama_petugas',
    username = '$username', 
    password = '$pass_ok', 
    ulang_pass = '$ulang_pass' 
    WHERE no_petugas = '$no_petugas'");

    if ($proses) {
        echo "<script>
                 alert('Berhasil mengubah data!');document.location='data_petugas.php'
             </script>";
    }else {
        echo "<script>
                alert('Gagal mengubah data!');document.location='data_petugas.php'
            </script>";
    }
}else {
    echo "<script>
            alert('Gagal mengubah data!, password dan ulangi password tidak sesuai...!');document.location='data_petugas.php'
        </script>";
}

?>