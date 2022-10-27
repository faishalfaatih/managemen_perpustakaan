<?php

include '../../../../koneksi.php';


$id_transaksi = $_POST ['id_transaksi'];
$kode_pinjam = $_POST ['kode_pinjam'];
$kode_kembali = $_POST ['kode_kembali'];

$hapus1 = mysqli_query($koneksi,"DELETE FROM tab_transaksi WHERE id_transaksi = '$id_transaksi'");
$hapus2 = mysqli_query($koneksi,"DELETE FROM tab_pinjam WHERE kode_pinjam='$kode_pinjam'");
$hapus3 = mysqli_query($koneksi,"DELETE FROM tab_kembali WHERE kode_kembali='$kode_kembali'");

if($hapus1){
    if ($hapus2) {
        if ($hapus3) {
            echo "<script>alert('Berhasil menghapus data!');document.location='transaksi_buku.php'</script>";
        }else {
            echo "<script>alert('Gagal menghapus data!');document.location='transaksi_buku.php'</script>";
        }
    }else {
        echo "<script>alert('Gagal menghapus pinjam!');document.location='transaksi_buku.php'</script>";
    }
}else {
    echo "<script>alert('Gagal menghapus transaksi!');document.location='transaksi_buku.php'</script>";
}


?>