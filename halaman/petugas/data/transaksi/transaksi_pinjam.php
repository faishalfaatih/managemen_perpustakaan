<?php

session_start();
include "../../../../koneksi.php";

?>

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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

    
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
                     <h2>Form Transaksi</h2>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                 <div class="panel panel-default">
                <div class="panel-heading">
                <h5>Silahkan masukan data!</h5>
                </div>
                <form role="form" action="proses_pinjam.php" method="POST">
                    <div class="form-group">
                        <label>Kode Buku</label>
                        <select class="form-control" name="kobu" id="kobu" onchange="autobuku()">
                            <option>Masukan kode buku</option>
                            <?php

                            $sql = mysqli_query($koneksi,"SELECT*FROM tab_buku order by kode_buku");

                            while ($data=$sql->fetch_assoc()) {
                                echo "<option value='$data[kode_buku]'>$data[kode_buku]</option>";
                            }

                            ?>
                        </select>
                    </div>


                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
                    <script type="text/javascript">
                        $("#kobu").select2();
                    </script>

                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input class="form-control" name="judul_buku" id="judul_buku" readonly />
                    </div> 

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script>
                    function autobuku() {
                        var kobu = $("#kobu").val();
                        $.ajax({
                            url : 'auto_buku.php',
                            data : "kobu="+kobu,
                        }).success(function(data){
                            var buku = data,
                            obj = JSON.parse(buku);
                            $("#judul_buku").val(obj.judul_buku);
                        })
                    }
                    </script>

                    <div class="form-group">
                        <label>No Anggota</label>
                        <select class="form-control" name="noinduk" id="noinduk" onchange="autonama()">
                            <option>Masukan nomor anggota</option>
                            <?php

                            $sql = mysqli_query($koneksi,"SELECT*FROM tab_anggota WHERE no_anggota");

                            while ($data=$sql->fetch_assoc()) {
                                echo "<option value='$data[no_anggota]'>$data[no_anggota]</option>";
                            }

                            ?>
                        </select>
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
                    <script type="text/javascript">
                        $("#noinduk").select2();
                    </script>

                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input class="form-control" name="nama_anggota" id="nama_anggota" readonly />
                    </div> 

                    <script>
                    function autonama() {
                        var noinduk = $("#noinduk").val();
                        $.ajax({
                            url : 'auto_anggota.php',
                            data : "noinduk="+noinduk,
                        }).success(function(data){
                            var namaang = data,
                            obj = JSON.parse(namaang);
                            $("#nama_anggota").val(obj.nama_anggota);
                        })
                    }
                    </script>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="no_petugas" id="no_petugas" value="<?= $_SESSION['no_petugas'] ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Kode Pinjam</label>
                        <input class="form-control" name="kode_pinjam" id="kode_pinjam" required/>
                    </div> 
                    <div class="form-group">
                        <label>Kode Kembali</label>
                        <input class="form-control" name="kode_kembali" id="kode_kembali" required/>
                    </div> 

                    <?php
                    
                    $tgl_pinjam = date("d-m-Y");
                    $tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
                    $jatuh_tempo = date("d-m-Y", $tujuh_hari);
                    
                    ?>
                    <div class="form-group">
                        <label for="">Tanggal Pinjam</label>
                        <input type="" type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo $tgl_pinjam; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="">Jatuh Tempo</label>
                        <input type="" type="text"  class="form-control" name="jatuh_tempo" id="jatuh_tempo" value="<?php echo $jatuh_tempo; ?>" readonly />
                    </div>                                       
                    <div class="form-group">
                        <input type="hidden" type="text"  class="form-control" name="tgl_kembali" id="tgl_kembali" value="<?php echo $jatuh_tempo; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="status" id="status" value="Pinjam" readonly/>
                    </div>                                       
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="denda" id="denda" value="0" readonly/>
                    </div>                                       
                    <div>                       
                        <a href="transaksi_buku.php" class="btn btn-danger">Kembali</a>
                        <input type="submit" name="simpan" value="Pinjam" class="btn btn-primary">
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
