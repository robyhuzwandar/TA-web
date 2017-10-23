<?php 
  include '../lib/Session.php';
  Session::checkSession();
?>
<!DOCTYPE html>
<html>
<head>
  <!-- <meta charset="utf-8"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Perpus | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- jvectormap -->
<link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Theme style -->
<link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
<!-- css datatables -->
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet">

        <!--java script-->
        <script src="assets/plugins/jQuery/jquery-3.1.1.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- //datatables export -->
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

        <script src="assets/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.js"></script>
        <!-- Sparkline -->
        <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="assets/plugins/chartjs/Chart.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- <script src="../assets/dist/js/pages/dashboard2.js"></script> -->
        <!-- AdminLTE for demo purposes -->
        <script src="assets/dist/js/demo.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>CB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Perpus</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="assets/img/cicle-logo.png" class="user-image" alt="User Image"> -->
                <?php 
                    include_once '../classes/Staf.php';
                    $a = new Staf();
                    $value = $a->getStafById(Session::get('id'));
                    if ($value) {
                      while ($result = $value->fetch_assoc()) {
                    ?>
                    <img src="<?php echo $result['foto'] ?>" class="user-image" alt="User Image">
                <?php } } ?>
              <span class="hidden-xs"><?php echo Session::get('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                 <?php 
                    include_once '../classes/Staf.php';
                    $a = new Staf();
                    $value = $a->getStafById(Session::get('id'));
                    if ($value) {
                      while ($result = $value->fetch_assoc()) {
                    ?>
                    <img src="<?php echo $result['foto'] ?>" class="img-circle" alt="User Image">
                  <?php } } ?>
                <p>
                  PC Bumigora - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
                <?php
                  if (isset($_GET['aksi']) && $_GET['aksi'] == "logout") {
                      Session::destroy();
                  }
               ?>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="?aksi=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
   
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php 
          include_once '../classes/Staf.php';
          $a = new Staf();
          $value = $a->getStafById(Session::get('id'));
          if ($value) {
            while ($result = $value->fetch_assoc()) {
          ?>
          <img src="<?php echo $result['foto'] ?>" class="img-circle" alt="User Image">
          <?php } } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo Session::get('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

         <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class=" treeview-menu">
            <li><a href="aksi/pinjamAdd.php"><i class="fa fa-circle-o"></i>Tambah Peminjam</a></li>
            <li><a href="view/pinjamlist.php"><i class="fa fa-circle-o"></i>List Peminjaman</a></li>
            <li><a href="view/telat.php"><i class="fa fa-circle-o"></i>Telat</a></li>
            <li><a href="aksi/pengembalian.php"><i class="fa fa-circle-o"></i>Pengembalian</a></li>
          </ul>
        </li>

        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class=" treeview-menu">
            <li><a href="aksi/bukuadd.php"><i class="fa fa-circle-o"></i>Tambah buku</a></li>
            <li><a href="view/bukulist.php"><i class="fa fa-circle-o"></i>List Buku</a></li>
          </ul>
        </li>

        <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Platform</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="aksi/platformadd.php"><i class="fa fa-circle-o"></i>Tambah Platform</a></li>
            <li><a href="view/platformlist.php"><i class="fa fa-circle-o"></i>List Platform</a></li>
          </ul>
        </li>

        <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Bahasa Pemrograman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="aksi/pemrogramanadd.php"><i class="fa fa-circle-o"></i>Tambah Bahasa Pemr.</a></li>
            <li><a href="view/pemrogramanlist.php"><i class="fa fa-circle-o"></i>List Bahasa Pemr.</a></li>
          </ul>
        </li>

        <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Member</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left "></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="aksi/memberAdd.php"><i class="fa fa-circle-o"></i>Tambah Member</a></li>
            <li><a href="view/memberlist.php"><i class="fa fa-circle-o"></i>List Member</a></li>
          </ul>
        </li>

        <?php 
          if (Session::get('level') == '0') {
        ?>
         <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Staf</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left "></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="aksi/stafAdd.php"><i class="fa fa-circle-o"></i>Tambah Staf</a></li>
            <li><a href="view/staflist.php"><i class="fa fa-circle-o"></i>List STaf</a></li>
          </ul>
        </li>
        <?php } ?>
    </section>
       <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    </section>

    <!-- Main content -->
      <?php 
        include 'view/beranda.php';
      ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
</body>
</html>
