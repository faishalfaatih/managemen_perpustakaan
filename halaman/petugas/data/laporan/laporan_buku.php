<html>
    <body>
        <table align="center">
            <tr>
                <td align="center">Laporan Daftar Buku</td>
            </tr>
            <tr>
                <table align="center" rules="all" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Penulis Buku</th>
                            <th>Penerbit Buku</th>
                            <th>Tahun Terbit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    include "../../../../koneksi.php";
                    $no = 1;
                    $ambil = mysqli_query($koneksi,"SELECT*FROM tab_buku");
                    while ($data = mysqli_fetch_array($ambil)) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['kode_buku']; ?></td>
                            <td><?php echo $data['judul_buku']; ?></td>
                            <td><?php echo $data['penulis_buku']; ?></td>
                            <td><?php echo $data['penerbit_buku']; ?></td>
                            <td><?php echo $data['tahun_terbit']; ?></td>
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