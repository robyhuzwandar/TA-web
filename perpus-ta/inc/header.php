<?php
include 'lib/Session.php';
Session::init ();
include 'lib/Database.php';
include 'lib/Format.php';
spl_autoload_register(function($class){
  include_once "classes/".$class.".php";
});
  $db = new Database();
  $fm = new Format();
  $b = new Buku();
  $m = new Member();
  // $dp = new DaftarPinjam();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
	<!-- css -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.css">
	<!-- js -->
  <script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>
	
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
  <img  src="assets/img/logopc.png" width="35px" height="35px"/><a class="navbar-brand" href="index.php">&nbspPerpus pc</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Beranda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftarpinjam.php">Daftar Pinjam</a>
      </li>
      <li class="nav-item">
            <?php
              if (isset($_GET['id'])) {
                  Session::destroy();
                }
            ?>
        <div class="btn-group">
          <a href="#" type="button" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profil
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#"><?php echo Session::get('nama')?></a>
            <a class="dropdown-item" href="#">Pengaturan</a>
            <div class="dropdown-divider"></div>
              <?php
              $login = Session::get("memberLogin");
              if ($login == false) { ?>
            <a class="dropdown-item" href="login.php">Login</a>
                <?php   }else{ ?>
            <a class="dropdown-item" href="?id=<?php Session::get('id')?>">Logout</a>
                <?php } ?>
          </div>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-default my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  </div>
</nav>
<div class="jumbotron jumbotron-fluid" style="height: 230px; background: #343a40 !important">
  <div class="container" style="color:white !important;">
    <h1 style="font-size: 40px !important" class="display-3">Perpus Programing Community</h1>
    <p class="lead">Perpustakaan berisi buku pembelajaran pemrograman</p>
  </div>
</div>
