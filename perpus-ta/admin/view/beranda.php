<?php 
include '../classes/Buku.php';
include '../classes/Member.php';
include '../classes/Beranda.php';
$be = new Beranda();
?>

<section class="content">
      <div class="row">
      <div class="col-md-2">
        <?php
          $b = new Buku();
          $jmB = $b->getJmBuku();
        ?>
        <div class="panel panel-default"">
            <div class="panel-heading">
                <center>Jumlah Buku</center>
            </div>
              <div class="panel-body">
                <?php 
                  $row = $jmB->fetch_row();
                  echo "<center><b>".$row[0]."<b></center>";
                ?>
              </div>
            </div>
        </div>

      <div class="col-md-2">
        <?php
          $m = new Member();
          $jmM = $m->getJmM();
        ?>
        <div class="panel panel-default"">
            <div class="panel-heading">
                <center>Jumlah Member</center>
            </div>
              <div class="panel-body">
                <?php 
                  $row = $jmM->fetch_row();
                  echo "<center><b>".$row[0]."<b></center>";
                ?>
              </div>
            </div>
        </div>

        <div class="col-md-2">
        <?php
          $jmBe = $be->JmBpemrP();
        ?>
        <div class="panel panel-default"">
            <div class="panel-heading">
                <center>Jumlah Buku PHP</center>
            </div>
              <div class="panel-body">
                <?php 
                  $row = $jmBe->fetch_row();
                  echo "<center><b>".$row[0]."<b></center>";
                ?>
              </div>
            </div>
        </div>

            <div class="col-md-2">
        <?php
          $jmBeJ = $be->JmBpemrJ();
        ?>
        <div class="panel panel-default"">
            <div class="panel-heading">
                <center>Jumlah Buku Java</center>
            </div>
              <div class="panel-body">
                <?php 
                  $row = $jmBeJ->fetch_row();
                  echo "<center><b>".$row[0]."<b></center>";
                ?>
              </div>
            </div>
        </div>

      </div> 
</section>