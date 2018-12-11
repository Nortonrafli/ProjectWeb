
<?php
 require 'functions.php';
 $Buku=query("SELECT * FROM Buku")
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
     
      <!--logo start-->
      <a href="index.php" class="logo"><b>PERPUSTAKAAN<span></span></b></a>
    
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
            <li><a href="Data_Buku.php">Data Buku</a></li>
     
            </ul>
          </li> 
          <li class="sub-menu">
            <a href="javascript:;">
              <span>MAHASISWA</span>
              </a>
            <ul class="sub">
            <li><a href="Data_Mahasiswa.php">Data Mahasiswa</a></li>
            
            </ul>
          </li> 
        </ul>
      </div>
    </aside><!--sidebar end-->
 
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>DATA BUKU</h3>
        <form  class="nav pull-right" role="form">
                <div class="col-xs-12 col-md-8">
                  <input type="text" size="35" class="form-control" id="exampleInputPassword2" placeholder="Masukkan Pencarian">
                </div>
                <button type="submit" name="cari" class="btn btn-theme">Cari</button>
              </form>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
            <a href="Tambah_buku.php" class="pull-left btn btn-theme02">+ Tambah Buku</a>
        
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Jenis Buku</th>
                    <th class="hidden-phone">Tanggal Terbit</th>
                    <th class="hidden-phone">Pengarang</th>
                  </tr>
                </thead>
             <tbody>
                <?php $i=1 ?>
                <?php while($row = mysqli_fetch_assoc($result)):?>
                <tr>
                 
                    <td><?= $row["Kode_Buku"]; ?></td>
                    <td><?= $row["Judul_Buku"]; ?></td>
                    <td><?= $row["Jenis_buku"]; ?></td>
                    <td><?= $row["Tanggal_terbit"]; ?></td>
                    <td><?= $row["Pengarang"]; ?></td>
                    <td>
                    <a class="btn btn-theme start" href="Update_buku.php?id=<?php echo $row["id"];?>" >
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Edit</span>
                    </a>
                  
                  <a class="btn btn-theme04 delete" href="HapusBuku.php?id=<?php echo $row["id"];?>"onclick="return confirm ('Apakah data ini akan dihapus')">
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
    }
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>

</html>
