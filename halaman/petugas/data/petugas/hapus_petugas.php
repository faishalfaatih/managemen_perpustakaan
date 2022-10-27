<?php
include '../../../../koneksi.php';
$hapus = mysqli_query($koneksi,"DELETE FROM tab_petugas WHERE no_petugas = '$_GET[id]'");

if($hapus){
    echo "<script>alert('Berhasil menghapus data petugas!');document.location='data_petugas.php'</script>";
}else {
    echo "<script>alert('Gagal menghapus data petugas!');document.location='data_petugas.php'</script>";
}


?>