<?php

include "../../../../koneksi.php";

$kodebuk = $_GET['kobu'];

$sql = mysqli_query($koneksi, "SELECT * FROM tab_buku WHERE kode_buku='$kodebuk'");
$buku = mysqli_fetch_array($sql);

$data = array(
    'judul_buku' => $buku['judul_buku']
);

echo json_encode($data);

?>