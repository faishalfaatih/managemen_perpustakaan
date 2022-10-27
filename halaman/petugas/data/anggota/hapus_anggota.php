<?php
include '../../../../koneksi.php';
$hapus = mysqli_query($koneksi,"DELETE FROM tab_anggota WHERE no_anggota = '$_GET[id]'");

if($hapus){
    echo "<script>alert('Berhasil menghapus data!');document.location='data_anggota.php'</script>";
}else {
    echo "<script>alert('Gagal menghapus data!');document.location='data_anggota.php'</script>";
}


?>