<?php

include '../../../../koneksi.php';

$no_petugas = $_POST ['no_petugas'];
$nama_petugas = $_POST ['nama_petugas'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$ulang_pass = $_POST ['ulang_pass'];

if ($password == $ulang_pass) {
      $pass_ok = md5($_POST['password']);
      $sql = mysqli_query($koneksi, "INSERT INTO tab_petugas 
      (no_petugas,nama_petugas,username,password,ulang_pass) 
      VALUES ('$no_petugas', '$nama_petugas', '$username', '$pass_ok', '$ulang_pass')");
      if ($sql) {
            echo "<script>
                        alert('Berhasil menambahkan data!');document.location='data_petugas.php'
                  </script>";
      }else {
            echo "<script>
                  alert('Gagal menambahkan data!');document.location='data_petugas.php'
            </script>";
      }
}else {
      echo "<script>
                  alert('Gagal menambahkan data!, password dan ulangi password tidak sesuai!');document.location='data_petugas.php'
            </script>";
}

?>