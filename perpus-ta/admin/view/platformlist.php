
<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php 
  if (isset($_GET['delPfId'])) {
    $id = $_GET['delPfId'];
    $delPf = $pf->delPfById($id);
  }
?>
<section class="content">
<div class="panel panel-default">
  <div class="panel-heading">
    List Platform
  </div>
  <div class="panel-body">
  <table class="table table-striped display" id="example" width="100%" cellspacing="0">
      <thead>
      <tr>
        <th>No.</th>
        <th>Jenis Platform</th>
        <th>Action</th>
      </tr>
    </thead>
        <tbody>
      <?php
      $i=0;
      $pf = $pf->getAllPf();
      if ($pf) {
        while ($result = $pf->fetch_assoc()) {
          $i++;
        ?>
      <tr>
        <td><?php echo $i."."; ?></td>
        <td><?php echo $result['nama']; ?></td>
        <td>
          <a href="../aksi/platformUpdate.php?pfId=<?php echo $result['id']; ?>"><button class="btn-primary btn-sm">Edit</button></a>
          <a onclick="return confirm('Yakin untuk Hapus Data ?')" href="platformlist.php?delPfId=<?php echo $result['id']; ?>"><button class="btn-danger btn-sm">Hapus</button></a>
           
        </td>
      </tr>
      <?php } } ?>
    </tbody>
  </table>
  </div>
</div>
</section>
<?php include '../inc/footer.php'; ?>