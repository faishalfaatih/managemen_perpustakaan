<?php

include "../../../../koneksi.php";

$no_anggota = $_POST ['no_anggota'];
$nama_anggota = $_POST ['nama_anggota'];
$email = $_POST ['email'];
$no_hp = $_POST ['no_hp'];
$alamat = $_POST ['alamat'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$ulang_pass = $_POST ['ulang_pass'];

if ($password == $ulang_pass) {
    $pass_ok = md5($password);
    $proses = mysqli_query($koneksi,"UPDATE tab_anggota SET 
    nama_anggota = '$nama_anggota',
    email = '$email',
    no_hp = '$no_hp',
    alamat = '$alamat',
    username = '$username', 
    password = '$pass_ok', 
    ulang_pass = '$ulang_pass' 
    WHERE no_anggota = '$no_anggota'");

    if ($proses) {
        echo "<script>
                 alert('Berhasil mengubah data!');document.location='data_anggota.php'
             </script>";
    }else {
        echo "<script>
                alert('Gagal mengubah data!');document.location='data_anggota.php'
            </script>";
    }
}else {
    echo "<script>
            alert('Gagal mengubah data!, password dan ulangi password tidak sesuai...!');document.location='data_anggota.php'
        </script>";
}

?>