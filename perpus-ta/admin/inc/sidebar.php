 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php 
                include_once '../../classes/Staf.php';
                $a = new Staf();
                $value = $a->getStafById(Session::get('id'));
                if ($value) {
                  while ($result = $value->fetch_assoc()) {
                ?>
                <img src="../<?php echo $result['foto'] ?>" class="img-circle" alt="User Image">
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
            <li><a href="../aksi/pinjamAdd.php"><i class="fa fa-circle-o"></i>Tambah Peminjam</a></li>
            <li><a href="../view/pinjamlist.php"><i class="fa fa-circle-o"></i>List Peminjaman</a></li>
            <li><a href="../iew/telat.php"><i class="fa fa-circle-o"></i>Telat</a></li>
            <li><a href="../aksi/pengembalian.php"><i class="fa fa-circle-o"></i>Pengembalian</a></li>
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
            <li><a href="../aksi/bukuadd.php"><i class="fa fa-circle-o"></i>Tambah buku</a></li>
            <li><a href="../view/bukulist.php"><i class="fa fa-circle-o"></i>List Buku</a></li>
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
            <li><a href="../aksi/platformadd.php"><i class="fa fa-circle-o"></i>Tambah Platform</a></li>
            <li><a href="../view/platformlist.php"><i class="fa fa-circle-o"></i>List Platform</a></li>
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
            <li><a href="../aksi/pemrogramanadd.php"><i class="fa fa-circle-o"></i>Tambah Bahasa Pemr.</a></li>
            <li><a href="../view/pemrogramanlist.php"><i class="fa fa-circle-o"></i>List Bahasa Pemr.</a></li>
          </ul>
        </li>

        <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Member</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../aksi/memberAdd.php"><i class="fa fa-circle-o"></i>Tambah Member</a></li>
            <li><a href="../view/memberlist.php"><i class="fa fa-circle-o"></i>List Member</a></li>
          </ul>
        </li>

        <?php 
            if (Session::get('level') == '0') {
          ?>
        <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="../aksi/stafAdd.php"><i class="fa fa-circle-o"></i>Tambah Staf</a></li>
            <li><a href="../view/staflist.php"><i class="fa fa-circle-o"></i>List Staf</a></li>
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