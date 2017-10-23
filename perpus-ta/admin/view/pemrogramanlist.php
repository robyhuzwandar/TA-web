<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<section class="content">
<?php 
  if (isset($_GET['delPemrId'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delPemrId']);
    $delPemr = $p->delPemrById($id);
  }
?>

<div class="panel panel-default">
  <div class="panel-heading">
    List Bahasa Pemrograman
  </div>
  <div class="panel-body">
        <?php 
          if (isset($delPemr)) {
            echo $delPemr;
          }
        ?>
      <table class="table table-striped display" id="example" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>No.</th>
            <th>Bahasa Pemrograman</th>
            <th>Action</th>
          </tr>
        </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Bahasa Pemrograman</th>
                <th>Action</th>   
              </tr>
            </tfoot>
            <tbody>
          <?php
          $i=0;
          $pemr = $p->getAllPemr();
          if ($pemr) {
            while ($result = $pemr->fetch_assoc()) {
              $i++;
            ?>
          <tr>
            <td><?php echo $i."."; ?></td>
            <td><?php echo $result['nama']; ?></td>
            <td>
              <a href="../aksi/pemrogramanUpdate.php?pemrId=<?php echo $result['id']; ?>"><button class="btn btn-primary btn-sm">Edit</button></a>
              <a href="pemrogramanlist.php?delPemrId=<?php echo $result['id']; ?>" onclick="return confirm('Yakin untuk Hapus Data ?')"><button class="btn btn-danger btn-sm">Hapus</button></a>
            </td>
          </tr>
          <?php } } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php include '../inc/footer.php'; ?>