<?php

include '../../../../koneksi.php';

$no_anggota = $_POST ['no_anggota'];
$nama_anggota = $_POST ['nama_anggota'];
$email = $_POST ['email'];
$no_hp = $_POST ['no_hp'];
$alamat = $_POST ['alamat'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$ulang_pass = $_POST ['ulang_pass'];

if ($password == $ulang_pass) {
      $pass_ok = md5($_POST['password']);
      $sql = mysqli_query($koneksi, "INSERT INTO tab_anggota 
      (no_anggota,nama_anggota,email,no_hp,alamat,username,password,ulang_pass) 
      VALUES ('$no_anggota', '$nama_anggota', '$email', '$no_hp', '$alamat', '$username', '$pass_ok', '$ulang_pass')");
      if ($sql) {
            echo "<script>
                        alert('Berhasil menambahkan data!');document.location='data_anggota.php'
                  </script>";
      }else {
            echo "<script>
                  alert('Gagal menambahkan data!');document.location='data_anggota.php'
            </script>";
      }
}else {
      echo "<script>
                  alert('Gagal menambahkan data!, password dan ulangi password tidak sesuai!');document.location='data_anggota.php'
            </script>";
}

?>