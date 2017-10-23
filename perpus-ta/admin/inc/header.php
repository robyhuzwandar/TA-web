<?php
include '../../lib/Database.php';
include '../../lib/Format.php';
include '../../classes/Buku.php';
include '../../classes/Pemrograman.php';
include '../../classes/Platform.php';
include '../../classes/Member.php';
include '../../classes/Transaksi.php';
include '../../classes/Staf.php';

  $db = new Database();
  $fm = new Format();
  $b = new Buku();
  $p = new Pemrograman();
  $pf = new Platform();
  $m = new Member();
  $s = new Staf();
  $t = new Transaksi();
 ?>
<?php 
  include '../../lib/Session.php';
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

<?php include '../inc/css.php'; ?>
<?php include '../inc/js.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>CB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Staf</b>Perpus</span>
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
          <li class="notifications-menu">
            <a href="#" >
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
          </li>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Pinjam
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 
                include_once '../../classes/Staf.php';
                $a = new Staf();
                $value = $a->getStafById(Session::get('id'));
                if ($value) {
                  while ($result = $value->fetch_assoc()) {
                ?>
                <img src="../<?php echo $result['foto'] ?>" class="user-image" alt="User Image">
              <?php } } ?>
              <span class="hidden-xs"> <?php echo Session::get('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                 <?php 
                include_once '../../classes/Staf.php';
                $a = new Staf();
                $value = $a->getStafById(Session::get('id'));
                if ($value) {
                  while ($result = $value->fetch_assoc()) {
                ?>
                <img src="../<?php echo $result['foto'] ?>" class="img-circle" alt="User Image">
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
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                    <?php
                      if (isset($_GET['action']) && $_GET['action'] == "logout") {
                          Session::destroy();
                      }
                    ?>
                <div class="pull-right">
                  <a href="?action=logout" class="btn btn-default btn-flat">Sign out</a>
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
   

