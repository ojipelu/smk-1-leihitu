<?php
session_start();
require_once("koneksi.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMK NEGERI 1 LEIHITU</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="templates/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="templates/font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"-->
    <!-- Theme style -->
    <link rel="stylesheet" href="templates/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="templates/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="templates/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="templates/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="templates/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
     <link rel="stylesheet" href="templates/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="templates/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="templates/plugins/datatables/dataTables.bootstrap.css">
    <!-- jQuery 2.1.4 -->
    <script src="templates/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="templates/plugins/validator/dist/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="templates/plugins/validator/dist/js/bootstrapValidator.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="templates/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="templates/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
  td{
  padding:5px;
}
.main-sidebar{
  margin-top:300px;
}
#kalender{
  background:#FFFFFF;
  border:1px solid #CCCCCC;
}
#banner{
  background:#FFFFFF;
  width:100%;
  height:350px;
}
#judul{
 font-size:27px;
 padding-top:15px;
 color:#605ca8;
}
#lokasi{
 font-size:24px;
 color:#605ca8;
}
#isi{
 background:#e6e4fc;
 padding:15px;
}
#konten{
 background:#FFFFFF;
 padding:10px;
}
/*
#data th{
  background:#0099CC;
}
#data tr:nth-child(even){
  background: #CCC
}
#data tr:nth-child(odd){
  background: #FFF
}
*/
.jumbotron{
  padding-bottom: 0px;
  padding-top: 10px;
  margin-bottom: -3px;
}
.container-fluid{
  margin-left: 0px;
  margin-right: 0px;
  padding-left: 0px;
  padding-right: 0px;
}
.logo-brand{
      width: 50px;
}
.navbar-brand{
    padding: 0px;
    padding-top: 1px;
}
.main-footer{
  background:#d3d3d3;
}


.footer__outro {
    border-top: 1px solid #a9a9a9;
    border-top-width: 1px;
    border-top-style: solid ;
    border-top-color: black;
    margin-top: 14px;
    padding-top: 4px;
}

  </style>
    <script>
  $(function(){
    $('#password').focus(function(){
      $('#password').attr('type', 'password');
    });
    $('#kalender').datepicker({
        inline: true,
        sideBySide: true,
        todayHighlight: true
    });
  });
  </script>  
  </head>

  <body class="hold-transition skin-blue-light layout-top-nav">
    <div class="wrapper">
  <header class="main-header">
      
      <div id="banner">
          <img src="../sekolah/gambar/smk.jpg" width="100%" height="350" align="left" >
          <div id="judul"></div>
            <div id="lokasi"></div>        
      </div>     

    <nav class="navbar navbar-primary">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">
            <img src="gambar/logosmk1.png" class="logo-brand"> 
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php echo isset($_GET['h'])&&$_GET['h']=='home'?'class="active"':''; ?>><a href="?h=home"><b>HOME</b></a></li>
            <li <?php echo isset($_GET['h'])&&$_GET['h']=='profil'?'class="active"':''; ?>><a href="?h=profil"><b>PROFIL</b></a></li>
            <li <?php echo isset($_GET['h'])&&$_GET['h']=='guru'?'class="active"':''; ?>><a href="?h=guru"><b>GURU</b></a></li>
            <li <?php echo isset($_GET['h'])&&$_GET['h']=='kegiatan'?'class="active"':''; ?>><a href="?h=kegiatan"><b>KEGIATAN</b></a></li>
            <li <?php echo isset($_GET['h'])&&$_GET['h']=='akademik'?'class="active"':''; ?>><a href="?h=akademik"><b>AKADEMIK</b></a></li>
            <li <?php echo isset($_GET['h'])&&$_GET['h']=='agenda'?'class="active"':''; ?>><a href="?h=agenda"><b>AGENDA</b></a></li>
            <li <?php echo isset($_GET['h'])&&$_GET['h']=='kalender'?'class="active"':''; ?>><a href="?h=kalender"><b>KALENDER</b></a></li>
          </ul>
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>     
      </div>
    <div>
    </nav>
  </header>
  


  <div class="content-wrapper" style="min-height: 212px;margin-top: 50px;">
    <div class="container">
    
</div>

    <div class="container">
     
      <section class="content">
        
        
        <div class="row">
       
          <div class="col-md-3">
         
              <div class="panel panel-primary">
                <div class="panel-heading">Kegiatan</div>
                <div class="panel-body">
                  <?php
                    $qKegiatan = mysqli_query($con, "select * from kegiatan order by tgl_posting desc");
                      while($hKegiatan = mysqli_fetch_array($qKegiatan)){
                      ?>
                      <a href="?h=kegiatan_detail&id=<?php echo $hKegiatan['id_kegiatan']; ?>">
                          <div style="background: #e6e4fc;padding: 5px;margin-top: 5px;"><?php echo $hKegiatan['nama_kegiatan']; ?></div>
                      </a>
                  <?php } ?>
                </div>
              </div>
          

            <div class="panel panel-primary">
              <div class="panel-heading">Akademik</div>
              <div class="panel-body">
                <?php
                  $qAkademik = mysqli_query($con, "select * from akademik order by tgl_posting desc");
                  while($hAkademik = mysqli_fetch_array($qAkademik)){
                ?>
                  <a href="?h=akademik_detail&id=<?php echo $hAkademik['id_akademik']; ?>">
                      <div style="background: #e6e4fc;padding: 5px;margin-top: 5px;"><?php echo $hAkademik['nama_akademik']; ?></div>
                  </a>
                <?php } ?>
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">Agenda</div>
              <div class="panel-body">
                <?php
                  $qAgenda = mysqli_query($con, "SELECT * FROM agenda ORDER BY tgl_agenda DESC");
                  while($hAgenda = mysqli_fetch_array($qAgenda)){
                ?>
                  <a href="?h=agenda_detail&id=<?php echo $hAgenda['id_agenda']; ?>">
                      <div style="background: #e6e4fc;padding: 5px;margin-top: 5px;"><?php echo $hAgenda['nama_agenda']; ?></div>
                  </a>
                <?php } ?>
              </div>
            </div>

          </div>

          <div class="col-md-6">
            <!-- <div class="box box-default">
              <div class="box-body">
                <p>Ini adalah anu</p>
              </div>
            </div> -->

            <?php
            if(!isset($_GET['h'])){
              require_once("home.php");
            }else{
              if (file_exists("$_GET[h].php")) {
                  require "$_GET[h].php";
              }else {
                require_once("tidak_ketemu.php");
              }
            }
            ?>
          </div>

          <div class="col-md-3">
            <div class="panel panel-primary">
              <div class="panel-heading">Login Siswa</div>
              <div class="panel-body">
                <?php if(!isset($_SESSION['mbr'])): ?>
                <form method="POST" action="login_cek.php">
                  <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">Login</button>
                </form>
                <?php else: ?>
                    <a href="keluar.php" class="btn btn-primary btn-block"> Logout</a>
                <?php endif; ?>
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">Kalender</div>
              <div class="panel-body">
                <div id="kalender"></div>
              </div>
            </div>

          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

<!-- <footer class="foooter-container" style="background: #ecf0f5;">
  <div class="container">
    <div class="footer-middle">
      <div class="row" t>
          <div class="wrap">
              <a class="logo" href="gambar/logo.png"></a>
          </div>
          <div class="container-fluid"> 
            <div class="pull-right col-md-3 col-sm-12 col-xs-12 animated footer-col fadeIn">
               <div class="address">
                  <h6 class="heading-bold">SMK NEGERI 1 LEIHITU</h6>
                     
                       <p> Alamat : Jl. Haturiri Hitu, Kabupaten Maluku Tengah, Maluku, 97581</p>
                          <p>Telp :085242943017</p>                            
               </div>
            </div>
          </div>     
    </div>
  </div> 
</footer>-->

 <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <a class="logo" href="gambar/logo.png"></a>
      </div>
       <div class="text">
          <div class="address">
             <h6 class="heading-bold">SMK NEGERI 1 LEIHITU</h6>
                <p> Alamat : Jl. Haturiri Hitu, Kabupaten Maluku Tengah, Maluku, 97581
                </p>
              <p>Telp :085242943017</p>                            
          </div>

            <p class="footer__outro">
          © 2019 SMK NEGERI 01 LEIHITU All Right Reversed
          </p>
        </div>
    </div> 
    <!-- /.container -->
  </footer>

</div>


    </div><!-- ./wrapper -->
    <!-- jQuery UI 1.11.4 -->
    <script src="templates/plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      //$.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="templates/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <!--script src="templates/https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script-->
    <script src="templates/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="templates/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="templates/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="templates/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="templates/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <!--script src="templates/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script-->
    <script src="templates/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="templates/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="templates/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="templates/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="templates/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="templates/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="templates/dist/js/demo.js"></script>
    <script type="text/javascript" src="templates/plugins/jQuery/ui.tabs.closable.min.js"></script>
    <!-- DataTables -->
    <script src="templates/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="templates/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="templates/plugins/autoNumeric.js"></script>
    <script src="templates/plugins/bootstrap-typeahead.js"></script>
    
    
  <link rel="stylesheet" type="text/css" href="templates/plugins/datatables/buttons.bootstrap.min.css">
  <script type="text/javascript" language="javascript" src="templates/plugins/datatables/dataTables.buttons.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="templates/plugins/datatables/buttons.bootstrap.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="templates/plugins/datatables/jszip.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="templates/plugins/datatables/pdfmake.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="templates/plugins/datatables/vfs_fonts.js">
  </script>
  <script type="text/javascript" language="javascript" src="templates/plugins/datatables/buttons.html5.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="templates/plugins/datatables/buttons.print.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="templates/plugins/datatables/buttons.colVis.min.js">
  </script>
    <script type="text/javascript" language="javascript" src="templates/plugins/jquery-csv-master/src/jquery.csv.min.js">
  </script>
  <script>

    
  </script>
  </body>
</html>

<?php
function data_login(){
  $CI =& get_instance();
  $CI->db->select('*');
  $CI->db->from('siswa s');
  $CI->db->join('kelas k', 's.id_kelas=k.id_kelas');
  $CI->db->join('jurusan j', 's.id_jurusan=j.id_jurusan');
  $CI->db->where('nis', $_SESSION['mbr']);
  return $CI->db->get()->row();
}
?>