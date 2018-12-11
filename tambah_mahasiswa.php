<?php
    // buat koneksi
    $conn = mysqli_connect("localhost","root","","perpustakaan");

    // cek apakah button submit sudah di tekan atau belum
    if(isset($_POST['submit']))
    {
        // cek isi dari post menggunakan vardump
        // var_dump($_POST);
        // var_dump($_FILES);
        // die();

        // mbil data dari tiap element dalam form yang disimpan di variabel baru
        $Nim = $_POST["Nim"];
        $Nama = $_POST["Nama"];
        $No_hp = $_POST["No_hp"];
        $Tanggal_lahir = $_POST["Tanggal_lahir"];
        $Jurusan = $_POST["Jurusan"];
        // $gambar = $_POST["Gambar"];

        // query insert data
        $query = " INSERT INTO mahasiswa
                    VALUES
                    ('','$Nim','$Nama','$No_hp','$Tanggal_lahir','$jurusan')";
        mysqli_query($conn,$query);

        // cek sukses data ditambah menggunakan mysqli_affected_rows
        // jika kita var_dump maka akan muncul int(1) jika gagal maka akan muncul int (-1)
        // var_dump(mysqli_affected_rows($conn));
        if(mysqli_affected_rows($conn) > 0) {
            echo "
            <script>
        alert('data berhasil disimpan');
        document.location.href = 'index.php';
        </script>
        ";
        }
        else {
            echo "
            <script>
            alert('data gagal disimpan');
            document.location.href = 'tambah_mahasiswa.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
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
</head>

<body>
  <section id="container">
   
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
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
    
      <section class="wrapper" action="" method="post">
        <h3><i class="fa fa-angle-right"></i>Data Mahasiswa</h3>
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Nim</label>
                  <div class="col-lg-4">
                    <input type="text" placeholder="" id="Nim" name="Nim" class="form-control">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Nama</label>
                  <div class="col-lg-4">
                    <input type="text" placeholder="" id="Nama" name="Nama" class="form-control">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">No Hp</label>
                  <div class="col-lg-4">
                    <input type="text" placeholder="" id="No_hp" name="No_hp" class="form-control">
                  </div>
                </div>
                <form action="#" class="form-horizontal style-form">
              <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Tanggal Lahir</label>
                  <div class="col-lg-4">
                    <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" name="Tanggal_lahir" value="">
        
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Jurusan</label>
                  <div class="col-lg-4">
                    <input type="text" placeholder="" id="f-name" class="form-control">
                  </div>
                </div> 
            
            <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button id="submit" name="submit" class="btn btn-theme" type="submit">Tambah</button>
                  </div>
                </div>
            
              </form>
            </div>
        </div>
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
