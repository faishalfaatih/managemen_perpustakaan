<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Transaksi | Petugas</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../../../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../../../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../../../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../../../assets/css/custom.css" rel="stylesheet" />
    <!-- TABLE STYLES-->
    <link href="../../../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">
                    Perpustakaan<h6>SMA N 1 Yogyakarta</h6>
                </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="../../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../../../assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="../../dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-3x"></i>Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../buku/data_buku.php">Data Buku</a>
                            </li>
                            <li>
                                <a href="../anggota/data_anggota.php">Data Anggota</a>
                            </li>
                            <li>
                                <a href="../petugas/data_petugas.php">Data Petugas</a>
                            </li>
                            <li>
                                <a class="active-menu" href="transaksi_buku.php">Data Transaksi</a>
                            </li>
                    </li>
                </ul>
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Kembalikan Buku</h2>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                 <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Apakah anda yakin ingin mengembalikan buku?</h5>
                </div>

                <?php
                include '../../../../koneksi.php';
                $ambil = mysqli_query($koneksi,"SELECT * FROM tab_transaksi 
                INNER JOIN tab_pinjam ON tab_pinjam.kode_pinjam = tab_transaksi.kode_pinjam
                INNER JOIN tab_kembali ON tab_kembali.kode_kembali = tab_transaksi.kode_kembali
                WHERE id_transaksi = '$_GET[id]'")or die(mysqli_error($koneksi));
                $data = mysqli_fetch_array($ambil);
                ?>
                <form role="form" action="proses_kembali.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $data['id_transaksi'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="kode_kembali" value="<?php echo $data['kode_kembali'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="status" value="Kembali" readonly>
                    </div>
                    <?php
                                        
                    $tgl_kembali = date("d-m-Y");
                    
                    ?>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="" class="form-control" name="tgl_kembali" value="<?php echo $tgl_kembali; ?>" readonly  />
                    </div>

                    <?php

                        include_once "terlambat_kembali.php";

                        $denda = 1000;

                        $tanggal_dateline = $data['jatuh_tempo'];

                        $jatuh_tempo=date('Y-m-d');

                        $lambat = terlambat($tanggal_dateline, $jatuh_tempo);

                        $denda1 = $lambat*$denda;

                    ?>

                    <div class="form-group">
                        <label>Denda</label>
                        <input type="" class="form-control" name="denda" value="<?php if ($lambat>0) {echo "$lambat hari (Rp $denda1)";}else{echo $lambat . " hari";}?>" readonly/>
                    </div>
                        <a href="transaksi_buku.php" class="btn btn-primary">< Kembali</a>
                        <input type="submit" name="kembali" value="Kembalikan" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan mengembalikan buku ini?')">
                    </div>                                        
                </form>

                 <!-- /. ROW -->         
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../../../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../../../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../../../assets/js/morris/morris.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="../../../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
      $(document).ready(function () {
        $("#dataTables-example").dataTable();
      });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../../../assets/js/custom.js"></script>
    
    
   
</body>
</html>
