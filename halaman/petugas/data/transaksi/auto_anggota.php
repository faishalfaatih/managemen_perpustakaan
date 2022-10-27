<?php

include "../../../../koneksi.php";

$noinduk = $_GET['noinduk'];

$sql = mysqli_query($koneksi, "SELECT * FROM tab_anggota WHERE no_anggota='$noinduk'");
$nama = mysqli_fetch_array($sql);

$data = array(
    'nama_anggota' => $nama['nama_anggota']
);

echo json_encode($data);

?>