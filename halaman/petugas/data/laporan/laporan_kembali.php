<html>
    <body>
        <table align="center">
            <tr>
                <td align="center">Laporan Transaksi Pinjam</td>
            </tr>
            <tr>
                <table align="center" rules="all" border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>No Anggota</th>
                        <th>Nama Anggota</th>
                        <th>No Petugas</th>
                        <th>Nama Operator</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Tanggal Kembali</th>
                        <th>Terlambat (Denda)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    include "../../../../koneksi.php";
                    $no = 1;
                    $ambil = mysqli_query($koneksi,"SELECT*FROM tab_transaksi 
                    INNER JOIN tab_buku ON tab_buku.kode_buku = tab_transaksi.kode_buku
                    INNER JOIN tab_anggota ON tab_anggota.no_anggota = tab_transaksi.no_anggota
                    INNER JOIN tab_petugas ON tab_petugas.no_petugas = tab_transaksi.no_petugas
                    INNER JOIN tab_pinjam ON tab_pinjam.kode_pinjam = tab_transaksi.kode_pinjam
                    INNER JOIN tab_kembali ON tab_kembali.kode_kembali = tab_transaksi.kode_kembali
                    WHERE status='Kembali'");
                    while ($data = mysqli_fetch_array($ambil)) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['kode_buku']; ?></td>
                            <td><?php echo $data['judul_buku']; ?></td>
                            <td><?php echo $data['no_anggota']; ?></td>
                            <td><?php echo $data['nama_anggota']; ?></td>
                            <td><?php echo $data['no_petugas']; ?></td>
                            <td><?php echo $data['nama_petugas']; ?></td>
                            <td><?php echo $data['tgl_pinjam']; ?></td>
                            <td><?php echo $data['jatuh_tempo']; ?></td>
                            <td><?php echo $data['tgl_kembali']; ?></td>
                            <td><?php echo $data['denda']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>                                        
                </tbody>
                </table>
            </tr>
        </table>
        <script>
            window.print();
        </script>
    </body>
</html>