<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['Hak_akses']==""){
		header("location:login.php?pesan=gagal");
	}

  ?>
  
<?php
 require 'functions1.php';
 $pinjam=query("SELECT * FROM Peminjaman");

//  tombol cari ditekan
// cari pada line 7 adalah nama dari button
if(isset($_POST["cari"]))
{
    // cari line 10adalah function dan keyword adalah nama dari inputan text
    $pinjam = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>PERPUSTAKAAN</title>


  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

</head>

<body>
  <section id="container">
  
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>PERPUSTAKAAN<span></span></b></a>
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="Logout.php">Keluar</a></li>
        </ul>
      </div>
    </header>
  
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
              <p class="centered"><a href="#"><img src="img/profil.png" class="img-circle" width="80"></a></p>
               <h5 class="centered">Admin</h5>

            <li class="sub-menu">
            <a href="javascript:;">
              <span>PEMINJAMAN</span>
              </a>
            <ul class="sub">
            <li><a href="index.php">Data Peminjaman</a></li>
            </ul>
          </li> 
          <li class="sub-menu">
            <a href="javascript:;">
              <span>BUKU</span>
              </a>
            <ul class="sub">
            <li><a href="data_buku.php">Data Buku</a></li>
            </ul>
          </li> 
          <li class="sub-menu">
            <a href="javascript:;">
              <span>MAHASISWA</span>
              </a>
            <ul class="sub">
            <li><a href="data_mahasiswa.php">Data Mahasiswa</a></li>
            </ul>
          </li> 
        </ul>
      </div>
    </aside>
  
    <section id="main-content">
      <section class="wrapper">
        <h3>DATA PEMINJAMAN</h3>
        <form  class="nav pull-right" role="form">
                <div class="col-xs-12 col-md-8">
                  <input type="text" size="35" class="form-control" id="exampleInputPassword2" placeholder="Masukkan keyword Pencarian">
                </div>
                <button type="submit" name="cari" class="btn btn-theme">Cari</button>
              </form>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
            <a href="Tambah_peminjaman.php" class="pull-left btn btn-theme02">+ Tambah Peminjam</a>
            <br>
              <table cellpadding="0" cellspacing="0" border="2" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th class="hidden-phone">Kode Buku</th>
                    <th class="hidden-phone">Judul Buku</th>
                    <th class="hidden-phone">Tanggal Peminjaman</th>
              
                  </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                <?php while($row = mysqli_fetch_assoc($result)):?>
                <tr>
                 
                    <td><?= $row["Nim"]; ?></td>
                    <td><?= $row["Nama"]; ?></td>
                    <td><?= $row["Kode_Buku"]; ?></td>
                    <td><?= $row["Judul_Buku"]; ?></td>
                    <td><?= $row["Tanggal_pinjam"]; ?></td>
                    <td>
                    <a class="btn btn-theme start" href="Update_peminjaman.php?id=<?php echo $row["id"];?>" >
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Edit</span>
                    </a>
                  
                  <a class="btn btn-theme04 delete" href="HapusPeminjaman.php?id=<?php echo $row["id"];?>"onclick="return confirm ('Apakah data ini akan dihapus')">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Hapus</span>
                    </a>
                   
                    </td>
                </tr>
            <?php $i++ ?>
          <?php endwhile;?>
          </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>POLITEKNIK NEGERI MALANG</strong>. All Rights Reserved
        </p>
        <div class="credits">
         
          Created Norton Rafli Ahmad template by <a href="#"></a>
        </div>
        </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    };
 /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
  </script>
</body>

</html>
