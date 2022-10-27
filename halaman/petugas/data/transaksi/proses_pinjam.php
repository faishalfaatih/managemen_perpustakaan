<?php

include '../../../../koneksi.php';

$kode_buku = $_POST ['kobu'];
$no_anggota = $_POST ['noinduk'];
$no_petugas = $_POST ['no_petugas'];
$kode_pinjam = $_POST ['kode_pinjam'];
$kode_kembali = $_POST ['kode_kembali'];
$tgl_pinjam = $_POST ['tgl_pinjam'];
$jatuh_tempo = $_POST ['jatuh_tempo'];
$tgl_kembali = $_POST ['tgl_kembali'];
$status = $_POST ['status'];
$denda = $_POST ['denda'];

$sql1 = "INSERT INTO tab_transaksi (kode_buku,no_anggota,no_petugas,kode_pinjam,kode_kembali,status) 
VALUES ('$kode_buku', '$no_anggota', '$no_petugas', '$kode_pinjam', '$kode_kembali', '$status')";
$sql2 = "INSERT INTO tab_pinjam (kode_pinjam, tgl_pinjam, jatuh_tempo)
VALUES ('$kode_pinjam', '$tgl_pinjam', '$jatuh_tempo')";
$sql3 = "INSERT INTO tab_kembali (kode_kembali, tgl_kembali, denda)
VALUES ('$kode_pinjam', '$tgl_kembali', '$denda')";
if (mysqli_query($koneksi, $sql3)) {
      if (mysqli_query($koneksi, $sql2)) {
            if (mysqli_query($koneksi, $sql1)) {
                  echo "<script>alert('Berhasil melakukan transaksi!');document.location='transaksi_buku.php'</script>";
            } else {
                  echo "<script>alert('Gagal masuk transaksi!');document.location='transaksi_buku.php'</script>";
            }
      } else {
            echo "<script>alert('Gagal masuk pinjam!');document.location='transaksi_buku.php'</script>";
      }
} else {
      echo "<script>alert('Gagal masuk kembali!');document.location='transaksi_buku.php'</script>";
}

?>