<?php
    require 'functions.php';
    // cek apakah button submit sudah di tekan atau belum

    // menggunakan method get untuk mengambil id yg telah terseleksi oleh user dan dimasukkan
    // ke dalam variabel baru yaitu $id
    // $id=$_GET["id"];
    // var_dump("$id");

    // // // query berdasarkan id
    // $mhs = query("SELECT * FROM mahasiswa WHERE id=$id");
    // var_dump($mhs);

    if(isset($_POST['submit']))
    {

    //cek sukses data ditambah menggunakan function tambah pada function.php
    if (edit($_POST)>0) 
    {
        echo "
        <script>
            alert('data berhasil diperbaharui');
            document.location.href='indexMahasiswa.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diperbaharui');
            document.location.href='edit.php';
        </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
    
    }
?>

<?php 
 // menggunakan method get untuk mengambil id yg telah terseleksi oleh user dan dimasukkan
    // ke dalam variabel baru yaitu $id
    $id=$_GET["id"];
    // var_dump($id);
     // // // query berdasarkan id
    $mhs = query("SELECT * FROM peminjaman WHERE id=$id")[0];
    // var_dump($mhs[0]["Nama"]);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Perpustakaan</title>

  <!-- Favicons -->
  
  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datetimepicker/datertimepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>PERPUSTAKAAN</b></a>
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="Logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
              <p class="centered"><a href="#"><img src="img/mahasiswa.png" class="img-circle" width="80"></a></p>
               <h5 class="centered">Mahasiswa</h5>

            <li class="sub-menu">
            <a href="javascript:;">
              <span>PEMINJAMAN</span>
              </a>
            <ul class="sub">
              <li><a href="crud_peminjamanMahasiswa.php">Masukkan Peminjaman</a></li>
            </ul>
          </li> 
          <li class="sub-menu">
            <a href="javascript:;">
              <span>BUKU</span>
              </a>
            <ul class="sub">
            <li><a href="data_bukuMahasiswa.php">Data Buku</a></li>
            </ul>
          </li> 
        </ul>
      </div>
    </aside>
          
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Data Peminjaman</h3>
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Nim</label>
                  <div class="col-lg-4">
                    <input type="text" placeholder="" id="l-name" class="form-control">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Nama</label>
                  <div class="col-lg-4">
                    <input type="email" placeholder="" id="email2" class="form-control">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Buku</label>
                  <div class="col-lg-4">
                    <input type="text" placeholder="" id="f-name" class="form-control">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Judul Buku</label>
                  <div class="col-lg-4">
                    <input type="text" placeholder="" id="f-name" class="form-control">
                  </div>
                </div>
                
              <form action="#" class="form-horizontal style-form">
              <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Tanggal Peminjaman</label>
                  <div class="col-lg-4">
                    <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="">
                    <span class="help-block">Select date</span>
                  </div>
                </div>
            <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit">Tambah</button>
                  </div>
                </div>
            
              </form>
            </div>
        </div>
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
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created Norton Rafli Ahmad template by <a href="#"></a>
        </div>
        <a href="advanced_table.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer><!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>

</body>

</html>
