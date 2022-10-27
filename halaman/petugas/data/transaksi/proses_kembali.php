<?php

include '../../../../koneksi.php';

$id_transaksi = $_POST ['id_transaksi'];
$kode_kembali = $_POST ['kode_kembali'];
$status = $_POST ['status'];
$tgl_kembali = $_POST ['tgl_kembali'];
$denda = $_POST ['denda'];

$kembali1 =  mysqli_query($koneksi,"UPDATE tab_transaksi SET status='$status' WHERE id_transaksi='$id_transaksi' ");
$kembali2 =  mysqli_query($koneksi,"UPDATE tab_kembali SET tgl_kembali='$tgl_kembali', denda='$denda' WHERE kode_kembali='$kode_kembali' ");

if ($kembali1) {
      if ($kembali2) {
            echo "<script>alert('Berhasil mengembalikan buku!');document.location='transaksi_buku.php'</script>";
      }else {
            echo "<script>alert('Gagal mengembalikan buku!');document.location='transaksi_buku.php'</script>";
      }
}else {
      echo "<script>alert('Gagal mengubah transaksi!');document.location='transaksi_buku.php'</script>";
}

?>